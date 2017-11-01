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

class Pproduct_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 제품 목록
     */
    public function get_product_list($start_page, $limit_page, $sort_field)
    {
        /* [find_word] => 시디퍼스
           [srh_field] => 서울 */
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
            }
        }

        $sort_qry = str_replace('-', ' ', $sort_field);    //talkcount-desc

        $sql = "SELECT * FROM product WHERE {$find_word}state = 'O' ORDER BY {$sort_qry} LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
            return $query->result();
    }

   /**
     * 제품 로우카운트
     */
    public function get_product_rowcount()
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
            }
        }
        $sql = "SELECT COUNT(id) AS rowcnt FROM product WHERE {$find_word}state = 'O'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }

    public function soldout($product_idx){
        
        $data = array(
                'soldout' => '매진'
            );

        $this->db->where('id', $product_idx);
        $this->db->update('product', $data);
        return $this->db->affected_rows();
    }
    public function stockin($product_idx){
        $data = array(
                'soldout' => '재고있음'
            );

        $this->db->where('id', $product_idx);
        $this->db->update('product', $data);
        return $this->db->affected_rows();

    }

}
