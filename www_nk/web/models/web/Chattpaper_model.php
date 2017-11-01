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

class Chattpaper_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 나-모든회원간 쪽지 로우카운트
     */
    public function get_chatt_rowcount($partner_code)
    {
        if ($partner_code == 'no') {         
            $sql = "SELECT COUNT(id) AS rowcnt FROM chattpaper WHERE sendercode = '{$this->session->userdata('user_code')}' OR receivercode = '{$this->session->userdata('user_code')}'";
        }
        else {
            $sql = "SELECT COUNT(id) AS rowcnt FROM chattpaper WHERE (sendercode = '{$this->session->userdata('user_code')}' OR receivercode = '{$this->session->userdata('user_code')}') 
                AND (sendercode = '{$partner_code}' OR receivercode = '{$partner_code}')";
        }
        
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }
    
    /**
     * 나-모든회원간 쪽지 목록
     */
    public function get_chatt_list($start_page, $limit_page, $partner_code)
    {      
        if ($partner_code == 'no') {
            $sql = "SELECT * FROM chattpaper WHERE sendercode = '{$this->session->userdata('user_code')}' OR receivercode = '{$this->session->userdata('user_code')}' 
                ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
        }
        else {
            $sql = "SELECT * FROM chattpaper WHERE (sendercode = '{$this->session->userdata('user_code')}' OR receivercode = '{$this->session->userdata('user_code')}') 
                AND (sendercode = '{$partner_code}' OR receivercode = '{$partner_code}') 
                ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
        }            
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();    
    }    
    
    /**
     * 존재하는 회원 (미탈퇴 회원) 인지 여부 판단      
     */
    public function has_article_auth($receiver_idx, $receiver_table)
    {       
        $this->db->select('nickname, usrcode');
        $this->db->from($receiver_table);
        $this->db->where('id', $receiver_idx);
        $query = $this->db->get();

        if ($query->num_rows() > 0)   
            return $row = $query->row_array();
    }    
    
    /**
     * 쪽지 저장
     */
    public function set_chattmessage($receiver_nick, $receiver_code) 
    {          
        if ($this->input->post('page_kind') == 'product')
            $topic_idx = $this->input->post('product_idx');
        else
            $topic_idx = 0;
        
        $data = array(
                'sender_id' => $this->session->userdata('user_id'),
                'sendertbl' => $this->session->userdata('group_table'),
                'sendercode' => $this->session->userdata('user_code'),
                'sendernick' => $this->session->userdata('user_nickname'),                
                'receiver_id' => $this->input->post('receiver_idx'),
                'receivertbl' => $this->input->post('receiver_kind'),
                'receivercode' => $receiver_code,
                'receivernick' => $receiver_nick,                                
                'message' => strip_tags(trim($this->input->post('message'))),
                'topic_id' => $topic_idx,
                'srhdate' => date('Ymd'),
				'regdate' => date('Y-m-d H:i:s')
            );

        $this->db->insert('chattpaper', $data);
                
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE chattflag SET newcount = newcount+1 WHERE receivercode = '{$receiver_code}'";
            $this->db->query($sql);
            if ($this->db->affected_rows() == 1) {
                return $this->db->affected_rows();
            } else {
                $sql2 = "INSERT INTO chattflag (receivercode, newcount) VALUES ('{$receiver_code}', 1)";
                $this->db->query($sql2);
                return $this->db->affected_rows();
            }
        } 
        else {            
            return 0;
        }
    }

    /**
     * 쪽지 갯수 플래그 0으로 초기화
     */
    public function set_alertflag_zero()
    {
        $this->db->set('newcount', 0);
        $this->db->where('receivercode', $this->session->userdata('user_code'));
        $this->db->update('chattflag');
    }
    
    /**
     * 제품을 두고 주고 받은 채팅 지수(chattcnt) 증가
     */
    public function set_product_chattjisu()
    {
        if ($this->input->post('product_idx') > 0) {
            $this->db->set('chattcnt', 'chattcnt+1', FALSE);
            $this->db->where('id', $this->input->post('product_idx'));
            $this->db->update('product');
        }
    }    
    
}