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

class Membership extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('web/home_model');
		$this->load->model('web/member_model');
		$this->load->helper(array('form', 'url'));
		$this->load->model('web/kindcode_model');
	    $this->load->library('form_validation');
	}

    public function index($encode_email = null)
    {
		if ($this->session->has_userdata('user_id'))
			redirect($this->config->item('base_url').'web');


		$data['user_email'] = urldecode($encode_email);
		//Furni Best
		$data['talkbestTopx'] = $this->home_model->get_talkbestx();
		//가구 종류 data
		$data['kindcode'] = $this->kindcode_model->get_kind_list();
		
		$this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass_word', '비밀번호', 'trim|required|min_length[6]|max_length[12]|regex_match[/^[a-zA-Z0-9_-]+$/]');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('user/members_login', $data);
	    }
	    else {
			$userOne = $this->member_model->get_auth_member($this->input->post('email'), $this->input->post('member_type'));
			if ($userOne) {
				$this->_auth_verify_process($userOne, $this->input->post('member_type'));
			} else {
				$this->session->set_userdata('deny_msg', '존재하지 않는 이메일 계정입니다!');
				$this->session->mark_as_flash('deny_msg');
				redirect($this->config->item('base_url').'web/user/membership/index', 'location', 302);
			}
	    }
    }
		public function findid(){
			$this->form_validation->set_rules('phone', '전화번호', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
			if ($this->form_validation->run() === FALSE) {
					$this->load->view('user/findid');
			}
			else{
				// redirect($this->config->item('base_url').'web');
				// echo $this->member_model->get_user_email($this->input->post('member_type'), $this->input->post('phone'));
				$data['getEmail'] = $this->member_model->get_user_email($this->input->post('member_type'), $this->input->post('phone'));

				$this->load->view('user/idresult', $data);
			}
		}
		public function findpassword($encode_email = null){
			if ($this->session->has_userdata('user_id'))
				redirect($this->config->item('base_url').'web');


			$data['user_email'] = urldecode($encode_email);

			$this->form_validation->set_rules('email','이메일','trim|required|valid_email');
			$this->form_validation->set_rules('phonenumber', '전화번호', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('user/findpassword',$data);
			}
			else{
				$userOne = $this->member_model->get_auth_member2($this->input->post('email'), $this->input->post('member_type'), $this->input->post('phonenumber'));

				if($userOne){
					// $newpw = $this->incrementalHash();
					$data['userOne'] = $userOne;
					$data['newpw'] = $this->member_model->change_new_password($userOne, $this->input->post('member_type'));
					// echo $userOne->emailid;
					$this->load->view('user/changepassword',$data);
				}
				else{
					$this->session->set_userdata('deny_msg', '일치하는 회원 정보가 없습니다.');
					$this->session->mark_as_flash('deny_msg');
					redirect($this->config->item('base_url').'web/user/membership/findpassword', 'location', 302);
				}
			}
		}
		public function incrementalHash($len = 6){
		  $charset = "0123456789abcdefghijklmnopqrstuvwxyz";
		  $base = strlen($charset);
		  $result = '';

		  $now = explode(' ', microtime())[1];
		  while ($now >= $base){
		    $i = $now % $base;
		    $result = $charset[$i] . $result;
		    $now /= $base;
		  }
		  return substr($result, -6);
		}
		public function changepassword(){
			$this->load->view('user/changepassword',$data);
		}
	public function logout()
	{
		if ($this->session->has_userdata('user_id')) {
			session_destroy();
			$this->session->sess_destroy();
			redirect($this->config->item('base_url').'web');
		}
		else {
			redirect($this->config->item('base_url').'web');
		}
	}


	private function _auth_verify_process($userOne, $member_type)
	{
	    if ($userOne->state != 'O') {
            $this->session->set_userdata('deny_msg', '이미 탈퇴한 회원입니다!');
            $this->session->mark_as_flash('deny_msg');
            redirect(base_url('web/user/membership'), 'location', 302);
	    }

		$pass_word = strtolower($this->input->post('pass_word'));

		if (password_verify($pass_word, $userOne->passwd))
		{
			//▽ 유저 세션세팅 (1은 개인유저) ───────────────────────────────────
	 		if ($member_type == 1) {
				$userdata = array(
						'user_id' => $userOne->id,
						'user_titlename' => $userOne->usrname,
						'user_nickname' => $userOne->nickname,
						'user_email' => $userOne->emailid,
						'user_code' => $userOne->usrcode,
						'group_mkind' => $userOne->middlekind,
						'group_table' => $userOne->userdbtable
					);
			} else {
				$userdata = array(
						'user_id' => $userOne->id,
						'user_titlename' => $userOne->corpname,
						'user_nickname' => $userOne->nickname,
						'user_email' => $userOne->emailid,
						'user_code' => $userOne->usrcode,
						'group_mkind' => $userOne->middlekind,
						'group_table' => $userOne->userdbtable
					);
			}

			$this->session->set_userdata($userdata);
            $new_chattcount = $this->member_model->set_login_success($userdata);
            $this->session->set_userdata('msgalert_box', $new_chattcount);

			if ($member_type == 2)
                redirect($this->config->item('base_url').'web/user/shop/home/'.$userOne->id);
            else
                redirect($this->config->item('base_url').'web/');
		}
		else {
			$this->session->set_userdata('deny_msg', '비밀번호가 일치하지 않습니다!');
			$this->session->mark_as_flash('deny_msg');
			redirect($this->config->item('base_url').'web/user/membership/index', 'location', 302);
		}
	}

    public function signout()
    {
        if ( ! $this->session->has_userdata('user_id'))
            show_404();

        $affected_rowcnt = $this->member_model->del_person_signout();
        if ($affected_rowcnt == 1)
            $this->logout();
    }
}
