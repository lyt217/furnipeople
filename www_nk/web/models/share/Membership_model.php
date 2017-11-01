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

class Membership_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	
	 public function get_access_token($group_code)
	 {
	 	$sql = "SELECT * FROM grouptoken WHERE groupid = ?";
		$query = $this->db->query($sql, array($group_code));

		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			show_404();					
	}	
	
	/**
	 * 특정 그룹의 엑세스 토큰 업데이트
	 */
	public function set_access_token($group_code, $access_token) 
	{					     				
	    $data = array(
	        	'acctoken' => $access_token,
	        	'upddate' => date('Ymd')
	    	);		
		$where = "groupid = '{$group_code}'";
		
		$sql = $this->db->update_string('grouptoken', $data, $where);
		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	/**
	 * 만일 일치하는 유저정보가 있으면 (유저이름, 유저가속한그룹명, 그룹코드, 엑세스토큰)을 가져가자
	 */
	public function get_auth_member($email_id)
	{
		$sql = "SELECT m.usrname, m.groupid, g.bigkind, g.middlekind, g.acctoken 
		FROM member AS m JOIN grouptoken AS g 
		ON m.groupid = g.groupid AND m.emailid = ? LIMIT 1";
		
		$query = $this->db->query($sql, array($email_id));
		return $query->row();
	}		
	
}