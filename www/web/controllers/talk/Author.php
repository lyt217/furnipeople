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

class Author extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->database();
		$this->load->library('session');
    $this->load->helper('my_definition');
		$this->load->model('web/home_model');
    $this->load->model('web/product_model');
		$this->load->model('web/kindcode_model');
		$this->load->model('web/member_model');
		$this->load->helper(array('form', 'url'));

  }
  public function user($userdbtable = "member", $userid = -1){

      $user = $this->member_model->get_user_info($userdbtable, $userid);
      echo json_encode($user);
  }

	public function userpoint($userdbtable = "member", $userid = -1){

      $user = $this->member_model->get_user_info($userdbtable, $userid);
      echo $user->usrpoint;
  }

}
