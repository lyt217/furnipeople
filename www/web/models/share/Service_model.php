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

class Service_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 건의/제휴 인서트
     */
    public function set_inquiry_proposal() 
    {
        $data = array(
                'guestname' => strip_tags(trim($this->input->post('uname'))),
                'gphone' => strip_tags(trim($this->input->post('phone'))),
                'gemail' => strip_tags(trim($this->input->post('email'))),
                'gbody' => strip_tags(trim($this->input->post('proposal'))),
                'srhdate' => date('Ymd'),
                'regdate' => date('Y-m-d H:i:s')                                                    
            );

        $this->db->insert('proposal', $data);
        return $this->db->affected_rows();
    }    
    
}