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

class Signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('web/member_model');
		$this->load->model('web/kindcode_model');
		$this->load->model('web/home_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('my_definition');

	}

	public function createmember()
	{
		if ($this->session->has_userdata('user_id'))
			redirect($this->config->item('base_url').'web');

		$this->form_validation->set_rules('user_name', '이름', 'trim|required');
		$this->form_validation->set_rules('nick_name', '닉네임', 'trim|required|callback_unique_nickname');
		$this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('pass_word1', '비밀번호', 'trim|required|min_length[6]|max_length[12]|regex_match[/^[a-zA-Z0-9_-]+$/]');
		$this->form_validation->set_rules('pass_word2', '비밀번호확인', 'trim|required|matches[pass_word1]');
		$this->form_validation->set_rules('phone', '전화번호', 'trim|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
		$this->form_validation->set_rules('contract1', '', 'required', array('required' => '이용약관에 동의하셔야 가입하실 수 있습니다.'));
		$this->form_validation->set_rules('contract2', '', 'required', array('required' => '개인정보취급방침에 동의하셔야 가입하실 수 있습니다.'));

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('user/signup_person');
    }
    else {
    	$encode_email = urlencode($this->input->post('email'));
		$affected_rowcnt = $this->member_model->set_person_user();
		if ($affected_rowcnt == 1)
			redirect($this->config->item('base_url').'web/user/membership/index/'.$encode_email, 'location', 301);
		else
			show_404();
    }
	}

	public function updatemember($passwd_change = null)
	{
		if ( ! $this->session->has_userdata('user_id'))
			show_404();

        if ($this->session->userdata('group_table') != 'member')
            redirect($this->config->item('base_url').'web');


		//Furni Best
		$data['talkbestTopx'] = $this->home_model->get_talkbestx();
		//가구 종류 data
		$data['kindcode'] = $this->kindcode_model->get_kind_list();

		$data['memberOne'] = $this->member_model->get_user_one('member');
		if (empty($data['memberOne']))
			show_404();

		if ($passwd_change == 'passwd') {
			$this->form_validation->set_rules('pass_word1', '비밀번호', 'trim|required|min_length[6]|max_length[12]|regex_match[/^[a-zA-Z0-9_-]+$/]');
			$this->form_validation->set_rules('pass_word2', '비밀번호확인', 'trim|required|matches[pass_word1]');
		} else {
			$this->form_validation->set_rules('user_name', '이름', 'trim|required');
			$this->form_validation->set_rules('nick_name', '닉네임', 'trim|required|callback_unique_nickname');
			$this->form_validation->set_rules('phone', '전화번호', 'trim|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
		}

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('user/signup_person_update', $data);
	    }
	    else {
			$affected_rowcnt = $this->member_model->set_person_update($passwd_change);
			if ($affected_rowcnt == 1) {
                $this->session->set_userdata('comple_msg', '회원정보가 정상적으로 변경되었습니다.');
                $this->session->mark_as_flash('comple_msg');
                redirect($this->config->item('base_url').'web/user/signup/updatemember');
			} else {
			    show_404();
			}
	    }
	}
	public function sendauthcode(){
		$config['mailtyle'] = 'html';
		$config['charset'] = 'utf-8';

		$mailaddress = $_POST['email'];

		if($this->member_model->has_email_unique2($mailaddress)){
			echo "notunique";
		}
		else{
			$six_digit_random_number = mt_rand(100000, 999999);

			$this->email->initialize($config);

			$this->email->from("noreply@furnipeople.com", "퍼니피플");
			$this->email->to($_POST['email']);
			$this->email->subject("[퍼니피플] 회원가입 이메일 인증 메일입니다.");

			$this->email->message("인증번호 : ".$six_digit_random_number);

			$this->email->send();

			echo $six_digit_random_number;
		}
	}
	public function createprovider()
	{
		if ($this->session->has_userdata('user_id'))
			redirect($this->config->item('base_url').'web');

		$this->form_validation->set_rules('corp_name', '회사이름', 'trim|required');
		$this->form_validation->set_rules('nick_name', '닉네임', 'trim|required|callback_unique_nickname');
		$this->form_validation->set_rules('email', '이메일', 'trim|required|valid_email|callback_unique_email');
		$this->form_validation->set_rules('pass_word1', '비밀번호', 'trim|required|min_length[6]|max_length[12]|regex_match[/^[a-zA-Z0-9_-]+$/]');
		$this->form_validation->set_rules('pass_word2', '비밀번호확인', 'trim|required|matches[pass_word1]');
		$this->form_validation->set_rules('cert_mobile', '전화번호', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');

        $this->form_validation->set_rules('address_jibun', '지번주소', 'trim|required');
        $this->form_validation->set_rules('address_road', '도로명주소', 'trim|required');
        $this->form_validation->set_rules('latitude', '위도', 'required');
        $this->form_validation->set_rules('longitude', '경도', 'required');

		$this->form_validation->set_rules('corp_phone', '대표번호', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
		$this->form_validation->set_rules('introduce', '기업소개', 'trim|required');
        $this->form_validation->set_rules('hash_tag[]', '업체검색키워드', 'trim');
		$this->form_validation->set_rules('contract1', '', 'required', array('required' => '이용약관에 동의하셔야 가입하실 수 있습니다.'));
		$this->form_validation->set_rules('contract2', '', 'required', array('required' => '개인정보취급방침에 동의하셔야 가입하실 수 있습니다.'));

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('user/signup_company');
	    }
	    else {
	    	$encode_email = urlencode($this->input->post('email'));
			$provider_id = $this->member_model->set_company_user();
			if ($provider_id) {
				$corp_logo_filename = $this->_upload_corplogo();
                if (empty($corp_logo_filename))
                    $corp_logo_filename = 'corplogo-ready.png';

				$this->member_model->set_company_logo($provider_id, $corp_logo_filename);
				redirect($this->config->item('base_url').'web/user/membership/index/'.$encode_email, 'location', 301);
			}
			else {
				show_404();
			}
	    }
	}

    public function updateprovider($passwd_change = null)
    {
        if ( ! $this->session->has_userdata('user_id'))
            show_404();

        if ($this->session->userdata('group_table') != 'provider')
            redirect($this->config->item('base_url').'web');

        $data['memberOne'] = $this->member_model->get_user_one('provider');
        if (empty($data['memberOne']))
            show_404();


				//Furni Best
				$data['talkbestTopx'] = $this->home_model->get_talkbestx();
				//가구 종류 data
				$data['kindcode'] = $this->kindcode_model->get_kind_list();

        $data['bizcategory_select'][$data['memberOne']->bizcategory] = TRUE;
        $data['corpkind_select'][$data['memberOne']->corpkind] = TRUE;
        $data['hashtag'] = explode('/', $data['memberOne']->hashtag);

        if ($passwd_change == 'passwd') {
            $this->form_validation->set_rules('pass_word1', '비밀번호', 'trim|required|min_length[6]|max_length[12]|regex_match[/^[a-zA-Z0-9_-]+$/]');
            $this->form_validation->set_rules('pass_word2', '비밀번호확인', 'trim|required|matches[pass_word1]');
        } else {
            $this->form_validation->set_rules('corp_name', '회사이름', 'trim|required');
            $this->form_validation->set_rules('nick_name', '닉네임', 'trim|required|callback_unique_nickname');
            $this->form_validation->set_rules('cert_mobile', '전화번호', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');

            $this->form_validation->set_rules('address_jibun', '지번주소', 'trim|required');
            $this->form_validation->set_rules('address_road', '도로명주소', 'trim|required');
            $this->form_validation->set_rules('latitude', '위도', 'required');
            $this->form_validation->set_rules('longitude', '경도', 'required');

            $this->form_validation->set_rules('corp_phone', '대표번호', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
            $this->form_validation->set_rules('introduce', '기업소개', 'trim|required');
            $this->form_validation->set_rules('hash_tag[]', '업체검색키워드', 'trim');
        }

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('user/signup_company_update', $data);
        }
        else {
            if (empty($passwd_change)) {

                $corp_logo_filename = $this->_upload_corplogo();
                if ( ! empty($corp_logo_filename)) {
                    $this->member_model->set_company_logo($this->session->userdata('user_id'), $corp_logo_filename);
                    $this->_file_erase($data['memberOne']->corplogo);
                }
            }
            $affected_rowcnt = $this->member_model->set_company_update($passwd_change);
            if ($affected_rowcnt == 1) {
                $this->session->set_userdata('comple_msg', '회원정보가 정상적으로 변경되었습니다.');
                $this->session->mark_as_flash('comple_msg');
                redirect($this->config->item('base_url').'web/user/signup/updateprovider');
            } else {
                show_404();
            }
        }
    }

    public function unique_email()
    {
        if ($this->member_model->has_email_unique($this->input->post('email'), 'member')) {
            $this->form_validation->set_message('unique_email', '중복된 {field}이 이미 있습니다.');
            return FALSE;
        }
        else if ($this->member_model->has_email_unique($this->input->post('email'), 'provider')) {
            $this->form_validation->set_message('unique_email', '중복된 {field}이 이미 있습니다.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

    public function unique_nickname()
    {
        if ($this->session->has_userdata('user_nickname')) {
            if ($this->session->userdata('user_nickname') == $this->input->post('nick_name'))
                return TRUE;
        }

        if ($this->input->post('nick_name') == '관리자' || $this->input->post('nick_name') == '퍼니피플' || $this->input->post('nick_name') == '운영자' || $this->input->post('nick_name') == 'admin' || $this->input->post('nick_name') == 'administrator') {
            $this->form_validation->set_message('unique_nickname', '사용할 수 없는 {field}입니다.');
            return FALSE;
        }
        else if ($this->member_model->has_nickname_unique($this->input->post('nick_name'), 'member')) {
            $this->form_validation->set_message('unique_nickname', '중복된 {field}이 이미 있습니다.');
            return FALSE;
        }
        else if ($this->member_model->has_nickname_unique($this->input->post('nick_name'), 'provider')) {
            $this->form_validation->set_message('unique_nickname', '중복된 {field}이 이미 있습니다.');
            return FALSE;
        }
        else {
            return TRUE;
        }
    }

	private function _upload_corplogo()
	{
		require_once('third_external/VerotUpload.php');
		$image_folder = '/home/hosting_users/furnipeopleweb/www/static/corplogo';

		$handle = new Upload($_FILES['corp_logo']);
		$corp_logo_filename = null;

		if ($handle->uploaded)
		{
			$handle->allowed = array('image/*');
			$handle->file_new_name_body = md5(uniqid(rand(), true));

			$handle->Process($image_folder);
			if ($handle->processed) {
				$corp_logo_filename = $handle->file_dst_name;
			}
			else {
				echo '최종 저장 폴더에 템포러리로 부터 카피된 파일이 없습니다.<br>';
				echo 'Error: ' . $handle->error . '<br>';
			}
			$handle-> Clean();
		}

		return $corp_logo_filename;
	}

    private function _file_erase($file_name)
    {
        $file_path = '/home/hosting_users/furnipeopleweb/www/static/corplogo/' . $file_name;

        if (is_file($file_path)) {
            if (unlink($file_path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
