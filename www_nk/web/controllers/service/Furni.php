<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** 
 * Copyright (c) 2016, 이철영
 *
 * 본 소스 코드의 지적 재산권 및 저작권은 개발사인 원소스의 이철영 대표에게 있습니다. 
 * 본 소스 코드를 허가 없이 복제, 배포 또는 수정 후 재판매를 할 경우 저작권법 위반으로 법의 처벌을 받게 됩니다.
 * 본 저작권 표시 문구는 저작자의 동의없이 수정 또는 삭제될 수 없습니다. 
 *   
 * @package    퍼니피플 플랫폼
 * @author      이철영
 * @copyright   Copyright (c) 2016, 원소스 (http://onesrc.kr)
 * @copyright   Copyright (c) 2016, 이철영 (010-7383-3275)
 * @link           http://onesrc.kr
 */
 
class Furni extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->model('share/service_model');
	}    
	     
    public function people()
	{
	    $this->load->view('service/furnipeople_present');
	}

    public function servicepolicy()
    {
        $this->load->view('service/policy_service');
    }
    
    public function privatepolicy()
    {
        $this->load->view('service/policy_privacy');
    }
    
    public function inquiry()
    {
        $this->load->model('share/service_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');        
                                                
        $this->form_validation->set_rules('uname', '이름', 'trim|required');
        $this->form_validation->set_rules('phone', '연락처', 'trim|required');    
        $this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email');
        $this->form_validation->set_rules('proposal', '내용', 'trim|required');            
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('service/inquiry_create');
        } 
        else {
            if (empty($this->input->post('g-recaptcha-response')))
                show_404();
                                                      
            $affected_rowcnt = $this->service_model->set_inquiry_proposal();
            if ($affected_rowcnt == 1) {
                $this->session->set_userdata('inquiry_msg', '정상적으로 발송되었습니다. 검토 후 답변드리도록 하겠습니다. 감사합니다.');
                $this->session->mark_as_flash('inquiry_msg');
                redirect(base_url('web/service/furni/inquiry'));
            } else {
                show_404();
            }         
        }
    }

}