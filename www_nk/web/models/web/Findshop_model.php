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

class Findshop_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    private function _df_bizcategory($biz_kind)
    {
        $category = array(
                'a' => '가구판매점',
                'b' => '인테리어',
                'c' => '설치/배송',
                'd' => '기타'
            );
        if (empty($category))
            return "bizcategory = '가구판매점' AND";
        else            
            return "bizcategory = '" . $category[$biz_kind] . "' AND";
    }    

    /**
     * Provider 전체 리스트
     */
    public function get_shop_list($start_page, $limit_page, $biz_kind)
    {
        if ($biz_kind != 'all')
            $bizcategory = $this->_df_bizcategory($biz_kind);
        else
            $bizcategory = null;
            
        $sql = "SELECT id, corpname, addressjibun, latitude, longitude, bizcategory, corpphone, introduce, corplogo, hashtag 
            FROM provider WHERE {$bizcategory} state = 'O' ORDER BY addressjibun ASC LIMIT {$start_page}, {$limit_page}";
            
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * Provider 전체 리스트 로우카운트
     */
    public function get_shop_rowcount($biz_kind)
    {
        if ($biz_kind != 'all')
            $bizcategory = $this->_df_bizcategory($biz_kind);
        else
            $bizcategory = null;
                          
        $sql = "SELECT COUNT(id) AS rowcnt FROM provider WHERE {$bizcategory} state = 'O'"; 
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];           
    }      
        
    /**
     * Provider 검색
     */
    public function get_shop_find($start_page, $limit_page)
    {                         
        if ($this->session->has_userdata('find_shop_post')) {    
            $find_arr = $this->session->userdata('find_shop_post');
            $query_kind = null;
                
            if ($find_arr['find_word'] != '') {
                $find_word1 = $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word1 = "shop.corpname LIKE '{$find_word1}' OR ";
                                    
                $find_word2 = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word2 = "shop.hashtag LIKE '{$find_word2}' AND ";
            } else {
                $find_word1 = null;
                $find_word2 = null;
            }
                
            if ($find_arr['srh_region'] != '') {                    
                $find_region = $this->db->escape_like_str($find_arr['srh_region']) . "%";
                $find_region = "shop.addressjibun LIKE '{$find_region}' AND ";
            } else {
                $find_region = null;
            }
                               
            if ($find_arr['srh_bizkind'] != '') {                    
                $find_bizkind = $this->db->escape($find_arr['srh_bizkind']);
                $find_bizkind = "shop.bizcategory = {$find_bizkind} AND ";
            } else {
                $find_bizkind = null;
            }                  
                
            if ($find_arr['srh_gagu'] != '') {                    
                $find_gagu = $this->db->escape($find_arr['srh_gagu']);
                $find_gagu = "prod.kindpname = {$find_gagu} AND ";
                $query_kind = 'join';
            } else {
                $find_gagu = null;
            }                
                
            if ($find_arr['srh_brand'] != '') {                    
                $find_brand = $this->db->escape($find_arr['srh_brand']);
                $find_brand = "prod.brand = {$find_brand} AND ";
                $query_kind = 'join';
            } else {
                $find_brand = null;
            }                                          
        } 
        else {
            show_404();
        }
            
        if (empty($query_kind)) {
            $sql = "SELECT shop.id, shop.corpname, shop.addressjibun, shop.latitude, shop.longitude, shop.bizcategory, shop.corpphone, shop.introduce, shop.corplogo, shop.hashtag 
                FROM provider AS shop WHERE {$find_word1}{$find_word2}{$find_region}{$find_bizkind} state = 'O' ORDER BY addressjibun ASC LIMIT {$start_page}, {$limit_page}";
        } 
        else {            
            $sql = "SELECT shop.id, shop.corpname, shop.addressjibun, shop.latitude, shop.longitude, shop.bizcategory, shop.corpphone, shop.introduce, shop.corplogo, shop.hashtag 
            FROM provider AS shop JOIN product AS prod 
            ON shop.id = prod.user_id AND prod.userdbtable = 'provider' AND {$find_word1}{$find_word2}{$find_region}{$find_bizkind}{$find_gagu}{$find_brand} shop.state = 'O' 
            ORDER BY shop.addressjibun ASC LIMIT {$start_page}, {$limit_page}";
        }        

        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();    
    }

    /**
     * Provider 검색 로우카운트
     */
    public function get_shopfind_rowcount()
    {
        $find_arr = $this->session->userdata('find_shop_post');
        $query_kind = null;
        
            if ($find_arr['find_word'] != '') {
                $find_word1 = $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word1 = "shop.corpname LIKE '{$find_word1}' OR ";
                                    
                $find_word2 = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word2 = "shop.hashtag LIKE '{$find_word2}' AND ";
            } else {
                $find_word1 = null;
                $find_word2 = null;
            }
                
            if ($find_arr['srh_region'] != '') {                    
                $find_region = $this->db->escape_like_str($find_arr['srh_region']) . "%";
                $find_region = "shop.addressjibun LIKE '{$find_region}' AND ";
            } else {
                $find_region = null;
            }
                               
            if ($find_arr['srh_bizkind'] != '') {                    
                $find_bizkind = $this->db->escape($find_arr['srh_bizkind']);
                $find_bizkind = "shop.bizcategory = {$find_bizkind} AND ";
            } else {
                $find_bizkind = null;
            }                  
                
            if ($find_arr['srh_gagu'] != '') {                    
                $find_gagu = $this->db->escape($find_arr['srh_gagu']);
                $find_gagu = "prod.kindpname = {$find_gagu} AND ";
                $query_kind = 'join';
            } else {
                $find_gagu = null;
            }                
                
            if ($find_arr['srh_brand'] != '') {                    
                $find_brand = $this->db->escape($find_arr['srh_brand']);
                $find_brand = "prod.brand = {$find_brand} AND ";
                $query_kind = 'join';
            } else {
                $find_brand = null;
            }         
                          
        if (empty($query_kind)) {
            $sql = "SELECT COUNT(shop.id) AS rowcnt FROM provider AS shop WHERE {$find_word1}{$find_word2}{$find_region}{$find_bizkind} state = 'O'";
        } 
        else {            
            $sql = "SELECT COUNT(shop.id) AS rowcnt 
            FROM provider AS shop JOIN product AS prod 
            ON shop.id = prod.user_id AND prod.userdbtable = 'provider' AND {$find_word1}{$find_word2}{$find_region}{$find_bizkind}{$find_gagu}{$find_brand} shop.state = 'O'";
        }          
        
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }  
                               	
}