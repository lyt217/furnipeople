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

class Myproduct_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 내 등록 제품 로우카운트
     */
    public function get_myproduct_rowcount()
    {       
        $sql = "SELECT COUNT(id) AS rowcnt FROM product WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O'";
         
        $query = $this->db->query($sql);
        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }    
    
    /**
     * 내 등록 제품 목록
     */
    public function get_myproduct_list($start_page, $limit_page)
    {                 
        $sql = "SELECT id, kindpname, mainimage, prodtitle, regdate, prodstate, sellprice, brand, readcount, interestcnt, chattcnt FROM product 
            WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' 
            ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();    
    }
    
    /**
     * 제품 하나 가져옴
     */
    public function get_product_one($idx)
    {
        $query = $this->db->get_where('product', array('id' => $idx), 1);
        return $query->row();
    }    
    
    /**
     * 찜제품 저장을 위해 제품정보 하나를 찜으로 카피 인서트
     */
    public function set_product_copy($productOne)
    {                                          
        $data = array(
                'usrcode' => $this->session->userdata('user_code'),
                'product_id' => $this->input->post('product_idx'),
                'nickname' => $productOne->nickname,
                'kindpname' => $productOne->kindpname,
                'prodtitle' => $productOne->prodtitle,
                'mainimage' => $productOne->mainimage,
                'prodstate' => $productOne->prodstate,
                'sellprice' => $productOne->sellprice,
                'brand' => $productOne->brand,
                'phone' => $productOne->phone,
                'address' => $productOne->address,               
                'srhdate' => date('Ymd'),
                'regdate' => date('Y-m-d H:i:s')
            );

        $this->db->insert('zzimproduct', $data);
        
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE product SET interestcnt = interestcnt+1 WHERE id = {$this->input->post('product_idx')}";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    /**
     * 실제 제품을 같은 찜제품 정보에 업데이트
     */
    public function set_product_copyupdate($productOne, $zzim_idx)
    {                                                  
        $data = array(
                'nickname' => $productOne->nickname,
                'kindpname' => $productOne->kindpname,
                'prodtitle' => $productOne->prodtitle,
                'mainimage' => $productOne->mainimage,
                'prodstate' => $productOne->prodstate,
                'sellprice' => $productOne->sellprice,
                'brand' => $productOne->brand,
                'phone' => $productOne->phone,
                'address' => $productOne->address,   
            );

        $this->db->where('id', $zzim_idx);
        $this->db->update('zzimproduct', $data);
        return $this->db->affected_rows();
    }  

   /**
     * 이미 찜 등록한 제품이 있는지 존재확인      
     */
    public function has_myzzim_being()
    {       
        $this->db->select('id');
        $this->db->from('zzimproduct');
        $this->db->where('usrcode', $this->session->userdata('user_code'));
        $this->db->where('product_id', $this->input->post('product_idx'));
        $query = $this->db->get();

        if ($query->num_rows() > 0)   
            return TRUE;    //존재하면
        else
            return FALSE;
    }
    
    /**
     * 찜 제품 로우카운트
     */
    public function get_myzzim_rowcount()
    {       
        $sql = "SELECT COUNT(id) AS rowcnt FROM zzimproduct WHERE usrcode = '{$this->session->userdata('user_code')}'";
         
        $query = $this->db->query($sql);
        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }    
    
    /**
     * 찜 제품 목록
     */
    public function get_myzzim_list($start_page, $limit_page)
    {                 
        $sql = "SELECT id, product_id, nickname, kindpname, mainimage, prodtitle, regdate, prodstate, sellprice, brand, phone, address FROM zzimproduct 
            WHERE usrcode = '{$this->session->userdata('user_code')}' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();    
    }
    
    /**
     * 찜 제품 하나 삭제
     */
    public function del_myzzim($zzim_idx)
    {
        $this->db->where('id', $zzim_idx);
        $this->db->where('usrcode', $this->session->userdata('user_code'));
        $this->db->delete('zzimproduct');
        return $this->db->affected_rows();
    }
              
}
    