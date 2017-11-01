<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
    
    /**
     * 임시 페이지 제작용 - http://furnipeople.com/web/debug/debug/readypage
     */
    public function readypage()
    {               
        $this->load->view('debug/page_ready');
    }    
	
	/**
	 * 로그인 성공한 유저의 세션 셋팅 정보 - http://furnipeople.com/web/debug/debug/myloginsession
	 */
	public function myloginsession()
	{
        exit();
		$this->load->view('debug/login_user_session');
	}
    
    /**
     * 특정 유저로 로그인 - http://furnipeople.com/web/debug/debug/spuserlogin
     */
    public function spuserlogin()
    {
        exit();
        $this->load->helper('url');
        $userdata = array(
                'user_id' => 2,
                'user_titlename' => '박표인',                     
                'user_nickname' => 'furniperson',
                'user_email' => 'pyoinpark@gmail.com',
                'user_code' => '201602252010360249',
                'group_mkind' => '운영그룹', 
                'group_table' => 'member',
                'msgalert_box' => 0
            );
        $this->session->set_userdata($userdata);
        redirect(base_url('web'));
    }    
	
    /**
     * 화면 IE9 교정
     */
    //public function ie9designfix()
    //{                                         
    //    
    //}
        
}