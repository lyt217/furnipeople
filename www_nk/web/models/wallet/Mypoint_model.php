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

class Mypoint_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 나의 총포인트
     */
    public function get_mypoint_total()
    {
        $this->db->select('usrpoint');
        $this->db->from($this->session->userdata('group_table'));
        $this->db->where('usrcode', $this->session->userdata('user_code'));
        $query = $this->db->get();
        $row = $query->row_array();    //Single Record Result > Array Version
        return $row['usrpoint'];
    }    
    
    /**
     * 나의 포인트 적립내역 로우카운트
     */
    public function get_myproduct_rowcount()
    {       
        $sql = "SELECT COUNT(id) AS rowcnt FROM eggpoint WHERE usrcode = '{$this->session->userdata('user_code')}'";
         
        $query = $this->db->query($sql);
        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }    
    
    /**
     * 나의 포인트 적립내역
     */
    public function get_mypoint_list($start_page, $limit_page)
    {                 
        $sql = "SELECT id, breakdown, regdate FROM eggpoint 
            WHERE usrcode = '{$this->session->userdata('user_code')}' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();    
    }
        
}