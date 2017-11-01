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

class Member_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * 만일 일치하는 유저정보가 있으면 로그인 성공 세션에 저장할 항목들을 가져감
	 */
	public function get_auth_member($email_id, $member_type)
	{
		if ($member_type == 1) {
			$sql = "SELECT m.id, m.usrname, m.nickname, m.emailid, m.usrcode, m.passwd, m.state, g.middlekind, g.userdbtable
			FROM member AS m JOIN grouptoken AS g
			ON m.groupid = g.groupid AND m.emailid = ? LIMIT 1";
		} else {
			$sql = "SELECT p.id, p.corpname, p.nickname, p.emailid, p.usrcode, p.passwd, p.state, g.middlekind, g.userdbtable
			FROM provider AS p JOIN grouptoken AS g
			ON p.groupid = g.groupid AND p.emailid = ? LIMIT 1";
		}

		$email_id = strtolower($email_id);
		$query = $this->db->query($sql, array($email_id));
		return $query->row();
	}

	/**
	 * 만일 일치하는 유저정보가 있으면 로그인 성공 세션에 저장할 항목들을 가져감2
	 */
	public function get_auth_member2($email_id, $member_type, $phonenumber)
	{
		if ($member_type == 1) {
			$sql = "SELECT m.id, m.usrname, m.nickname, m.emailid, m.usrcode, m.passwd, m.state, g.middlekind, g.userdbtable
			FROM member AS m JOIN grouptoken AS g
			ON m.groupid = g.groupid AND m.emailid = ? AND m.phone = ? LIMIT 1";
		} else {
			$sql = "SELECT p.id, p.corpname, p.nickname, p.emailid, p.usrcode, p.passwd, p.state, g.middlekind, g.userdbtable
			FROM provider AS p JOIN grouptoken AS g
			ON p.groupid = g.groupid AND p.emailid = ? AND p.mobile = ? LIMIT 1";
		}

		$email_id = strtolower($email_id);
		$query = $this->db->query($sql, array($email_id, $phonenumber));
		return $query->row();
	}

	public function change_new_password($userOne, $member_type){
		$newpw = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
		$pass_word = strtolower($newpw);
		$pass_word = password_hash($pass_word, PASSWORD_DEFAULT);

		$data = array(
						'passwd' => $pass_word,
						'updeldate' => date('Y-m-d H:i:s')
				);


		if($member_type == 1){
			$this->db->where('id', $userOne->id);
			$this->db->update('member', $data);
	    if($this->db->affected_rows() == 1){
				return $newpw;
			}
			else{
				return "";
			}
		}
		else{
			$this->db->where('id', $userOne->id);
			$this->db->update('provider', $data);
	    // return $this->db->affected_rows();
			if($this->db->affected_rows() == 1){
				return $newpw;
			}
			else{
				return "";
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
	/**
	 * 개인 회원정보 인서트
	 */
	public function set_person_user()
	{
		$pass_word = strtolower($this->input->post('pass_word1'));
		$pass_word = password_hash($pass_word, PASSWORD_DEFAULT);

        $tcode = date('YmdHis');
        $mtime = microtime();
        $mtime = $mtime * $tcode;
        $mtime = substr((string) $mtime, 0, 4);
        $user_code = (string) $tcode . $mtime;

	    $data = array(
	    		'groupid' => 'G-003',
	    		'usrname' => $this->input->post('user_name'),
	    		'nickname' => $this->input->post('nick_name'),
	    		'emailid' => strtolower($this->input->post('email')),
				'usrcode' => $user_code,
	    		'passwd' => $pass_word,
	    		'phone' => $this->input->post('phone'),
	        	'srhdate' => date('Ymd'),
				'regdate' => date('Y-m-d H:i:s'),
	        	'loginip' => $this->input->ip_address()
	    	);

		$this->db->insert('member', $data);
		return $this->db->affected_rows();
	}

	/**
	 * 기업 회원정보 인서트
	 */
	public function set_company_user()
	{
		$pass_word = strtolower($this->input->post('pass_word1'));
		$pass_word = password_hash($pass_word, PASSWORD_DEFAULT);

    $tcode = date('YmdHis');
    $mtime = microtime();
    $mtime = $mtime * $tcode;
    $mtime = substr((string) $mtime, 0, 4);
    $user_code = (string) $tcode . $mtime;

    $tag_str = null;
    for ($i = 0; $i < count($this->input->post('hash_tag[]')); $i++) {
        if ($this->input->post('hash_tag[]')[$i])
            $tag_str .= $this->input->post('hash_tag[]')[$i] . '/';
    }
    $tag_str = substr(rtrim($tag_str), 0, -1);

    $data = array(
    		'groupid' => 'G-004',
    		'corpname' => $this->input->post('corp_name'),
    		'nickname' => $this->input->post('nick_name'),
    		'emailid' => strtolower($this->input->post('email')),
				'usrcode' => $user_code,
    		'passwd' => $pass_word,
    		'mobile' => $this->input->post('cert_mobile'),
    		'zipcode' => $this->input->post('zip_code'),
        'addressjibun' => $this->input->post('address_jibun'),
        'addressroad' => $this->input->post('address_road'),
        'addrdetail' => $this->input->post('address_detail'),
        'latitude' => $this->input->post('latitude'),
        'longitude' => $this->input->post('longitude'),
      	'srhdate' => date('Ymd'),
				'regdate' => date('Y-m-d H:i:s'),
      	'loginip' => $this->input->ip_address(),
      	'corpnumber' => $this->input->post('corp_number'),
      	'bizcategory' => $this->input->post('biz_category'),
      	'corpkind' => $this->input->post('corp_kind'),
      	'pointer' => $this->input->post('pointer_man'),
      	'pointerphone' => $this->input->post('pointer_phone'),
      	'corpphone' => $this->input->post('corp_phone'),
      	'introduce' => strip_tags(trim($this->input->post('introduce'))),
      	'hashtag' => $tag_str
  	);

		$this->db->insert('provider', $data);
		return $this->db->insert_id();
	}

    /**
     * 개인 회원정보 업데이트
     */
	public function set_person_update($passwd_change)
	{
        if ($passwd_change == 'passwd') {
            //패스워드만 변경
            $pass_word = strtolower($this->input->post('pass_word1'));
            $pass_word = password_hash($pass_word, PASSWORD_DEFAULT);
            $data = array(
                    'passwd' => $pass_word,
                    'updeldate' => date('Y-m-d H:i:s')
                );
        } else {
            $data = array(
                    'usrname' => $this->input->post('user_name'),
                    'nickname' => $this->input->post('nick_name'),
                    'phone' => $this->input->post('phone'),
                    'updeldate' => date('Y-m-d H:i:s')
                );
        }

        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('member', $data);
        return $this->db->affected_rows();
	}

    /**
     * 기업 회원정보 업데이트
     */
	public function set_company_update($passwd_change)
	{
        if ($passwd_change == 'passwd') {
            //패스워드만 변경
            $pass_word = strtolower($this->input->post('pass_word1'));
            $pass_word = password_hash($pass_word, PASSWORD_DEFAULT);
            $data = array(
                    'passwd' => $pass_word,
                    'updeldate' => date('Y-m-d H:i:s')
                );
        }
        else {
            $tag_str = null;
            for ($i = 0; $i < count($this->input->post('hash_tag[]')); $i++) {
                if ($this->input->post('hash_tag[]')[$i])
                    $tag_str .= $this->input->post('hash_tag[]')[$i] . '/';
            }
            $tag_str = substr(rtrim($tag_str), 0, -1);

            $data = array(
                    'corpname' => $this->input->post('corp_name'),
                    'nickname' => $this->input->post('nick_name'),
                    'mobile' => $this->input->post('cert_mobile'),
                    'zipcode' => $this->input->post('zip_code'),
                    'addressjibun' => $this->input->post('address_jibun'),
                    'addressroad' => $this->input->post('address_road'),
                    'addrdetail' => $this->input->post('address_detail'),
                    'latitude' => $this->input->post('latitude'),
                    'longitude' => $this->input->post('longitude'),
                    'corpnumber' => $this->input->post('corp_number'),
                    'bizcategory' => $this->input->post('biz_category'),
                    'corpkind' => $this->input->post('corp_kind'),
                    'pointer' => $this->input->post('pointer_man'),
                    'pointerphone' => $this->input->post('pointer_phone'),
                    'corpphone' => $this->input->post('corp_phone'),
                    'introduce' => strip_tags(trim($this->input->post('introduce'))),
                    'updeldate' => date('Y-m-d H:i:s'),
                    'hashtag' => $tag_str
                );
        }

        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('provider', $data);
        return $this->db->affected_rows();
	}

	/**
	 * 기업 로고이미지 업데이트
	 */
	public function set_company_logo($provider_id, $corp_logo_filename = null)
	{
        if (empty($corp_logo_filename)) {
            return;
		} else {
			//echo '첨부파일 있음' . $corp_logo_filename;
			$this->db->set('corplogo', $corp_logo_filename);
			$this->db->where('id', $provider_id);
			$this->db->update('provider');
		}
	}

	/**
	 * 유저 하나 가져옴
	 */
	public function get_user_one($user_table)
	{
		$query = $this->db->get_where($user_table, array('id' => $this->session->userdata('user_id')), 1);
		return $query->row();
	}
	/**
	 * 휴대폰 번호로 이메일 찾기
	 */
	public function get_user_email($member_kind, $phonenumber)
	{

		// return $phonenumber;
		if($member_kind == 1){
			$query = $this->db->get_where('member', array('phone' => $phonenumber)); //$this->db->query($sql);
			if ($query->num_rows() > 0){
				return $query->first_row()->emailid;
			}
			else{
				return "noresult";
			}
		}
		else{
			$query = $this->db->get_where('provider', array('mobile' => $phonenumber)); //$this->db->query($sql);
			if ($query->num_rows() > 0){
				return $query->first_row()->emailid;
			}
			else{
				return "noresult";
			}
		}
	}


	/**
	* 유저 테이블, id로 정보 가져옴
	*/
	public function get_user_info($user_table, $user_id){
		$query = $this->db->get_where($user_table, array('id' => $user_id) , 1);
		return $query->row();
	}

    /**
     * 중복된 이메일 인지 여부 판단
     */
    public function has_email_unique($email, $member_kind)
    {
        $this->db->select('id');
        $this->db->from($member_kind);
        $this->db->where('emailid', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return TRUE;    //중복된 이메일이 존재하면 TRUE반환
    }

    /**
     * 중복된 이메일 인지 여부 판단
     */
    public function has_email_unique2($email)
    {
        $this->db->select('id');
        $this->db->from('member');
        $this->db->where('emailid', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return TRUE;    //중복된 이메일이 존재하면 TRUE반환

				else{
					$this->db->select('id');
	        $this->db->from('provider');
	        $this->db->where('emailid', $email);
	        $query = $this->db->get();

	        if ($query->num_rows() > 0)
	            return TRUE;
					else{
						return FALSE;
					}
				}
    }

		/**
     * 중복된 닉네임 인지 여부 판단
     */
    public function has_nickname_unique($nick_name, $member_kind)
    {
        $this->db->select('id');
        $this->db->from($member_kind);
        $this->db->where('nickname', $nick_name);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return TRUE;    //중복된 닉네임이 존재하면 TRUE반환
    }


    /**
     * 로그인 성공 후 처리할 것들
     */
    public function set_login_success($userdata)
    {
        //▽ 카운트, 로그인일시, IP 갱신 ───────────────────────────────────
        $this->db->set('logindate', date('Y-m-d H:i:s'));
        $this->db->set('logincount', 'logincount+1', FALSE);
        $this->db->set('loginip', $this->input->ip_address());
        $this->db->where('id', $userdata['user_id']);
        $this->db->update($userdata['group_table']);

        //▽ 신규 쪽지 갯수 획득 ───────────────────────────────────
        $this->db->select('newcount');
        $this->db->from('chattflag');
        $this->db->where('receivercode', $this->session->userdata('user_code'));
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row_array();
            return $row['newcount'];
        } else {
            return 0;
        }
    }

		/**
     * 개인회원 탈퇴
     */
    public function del_person_signout()
    {
        $data = array(
                'usrname' => '직접탈퇴',
                'nickname' => '',
                'phone' => '',
                'updeldate' => date('Y-m-d H:i:s'),
                'state' => '탈퇴'
            );

        $this->db->where('id', $this->session->userdata('user_id'));
        $this->db->update('member', $data);
        return $this->db->affected_rows();
    }

}
