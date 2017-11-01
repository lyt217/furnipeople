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

class Mypoint extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('wallet/mypoint_model');
    }

    public function index($bulk = 'all', $srh_mode = 'no', $start_page = null)
    {       
        $this->load->helper('url');
        if ( ! $this->session->has_userdata('user_id'))
            redirect(base_url('web/user/membership'));

        $this->load->library('pagination');                 
        
        $limit_page = 30;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;
        
        $paginate_url = '/web/wallet/mypoint/index/all/no';
        
        $data['pointTotal'] = $this->mypoint_model->get_mypoint_total();    //나의 총포인트        
        $data['pointList'] = $this->mypoint_model->get_mypoint_list($start_page, $limit_page);    //나의 포인트 적립 내역
        $total_rows = $this->mypoint_model->get_myproduct_rowcount();
                            
        $config['base_url'] = $paginate_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 6;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('mymy/my_point', $data);
    }  
    
}    