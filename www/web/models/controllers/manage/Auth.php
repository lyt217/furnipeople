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

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('manage/mmember_model');
    }      
    
    public function login()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');                        
             
        //로그인한 유저들의 재진입 방지
        if ($this->session->has_userdata('user_id'))
            redirect(base_url('web'));
        
        //▽ Form Data Validation ───────────────────────────────────                                       
        $this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email');
        $this->form_validation->set_rules('pass_word', '비밀번호', 'trim|required|min_length[6]|max_length[12]|regex_match[/^[a-zA-Z0-9_-]+$/]');                      
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('manage/user/manager_login');
        } 
        else {                                  
            $userOne = $this->mmember_model->get_auth_member($this->input->post('email'));
            if ($userOne) {
                $this->_auth_verify_process($userOne);
            } else {
                $this->session->set_userdata('deny_msg', '존재하지 않는 이메일 계정입니다!');
                $this->session->mark_as_flash('deny_msg');
                redirect(base_url('web/manage/auth/login'), 'location', 302);
            }           
        }                       
    }

    /**
     * 패스워드까지 일치하면 로그인 성공 
     */
    private function _auth_verify_process($userOne)
    {
        $pass_word = strtolower($this->input->post('pass_word'));

        if (password_verify($pass_word, $userOne->passwd)) 
        {                                                                                               
            $userdata = array(                      
                    'user_id' => $userOne->id,
                    'user_titlename' => $userOne->usrname,
                    'user_nickname' => $userOne->nickname,
                    'user_email' => $userOne->emailid,
                    'user_code' => $userOne->usrcode,
                    'group_mkind' => $userOne->middlekind,
                    'group_table' => $userOne->userdbtable,
                    'msgalert_box' => 0
                );
            $this->session->set_userdata($userdata);            
            redirect(base_url('web/manage/mmember/search'));    //차후 대시보드로 보낼것
        } 
        else {
            $this->session->set_userdata('deny_msg', '비밀번호가 일치하지 않습니다!');
            $this->session->mark_as_flash('deny_msg');
            redirect(base_url('web/manage/auth/login'), 'location', 302);
        }       
    }

    public function logout()
    {
        $this->load->helper('url');
        
        if ($this->session->has_userdata('user_id')) {
            session_destroy();
            $this->session->sess_destroy();            
            redirect(base_url('web/manage/auth/login'));
        }
        else {
            redirect(base_url('web/manage/auth/login'));
        }
    } 
    
}