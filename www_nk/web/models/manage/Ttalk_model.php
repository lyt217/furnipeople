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

class Ttalk_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 아티클 목록 (공용)
     */
    public function get_article_list($start_page, $limit_page, $table_name, $sort_field)
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
                        
        $sql = "SELECT * FROM {$table_name} WHERE {$find_word}state = 'O' ORDER BY {$sort_qry} LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);
                    
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
   /**
     * 아티클 로우카운트 (공용)
     */
    public function get_article_rowcount($table_name)
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {    
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
            }                                      
        }        
        $sql = "SELECT COUNT(id) AS rowcnt FROM {$table_name} WHERE {$find_word}state = 'O'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }
    
    /**
     * 아티클 하나 가져옴
     */
    public function get_article_one($article_idx, $table_name)
    {
        $query = $this->db->get_where($table_name, array('id' => $article_idx), 1);
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * 아티클 삭제 스텝 1 : 아티클 소유 유저 DB의 보유 아티클총수와 포인트 차감
     */  
    public function del_article_step1($artcleOne, $table_name)
    {
        $point = df_furni_point($table_name);
        $point_dec = 'usrpoint-' . $point;    //차감 포인트 설정값 가져옴
                
        $this->db->set('usrpoint', $point_dec, FALSE);
        $this->db->set('talkcount', 'talkcount-1', FALSE);    //FALSE는 readcount+1 에서 백틱제거
        $this->db->set('updeldate', date('Y-m-d H:i:s'));                        
        $this->db->where('id', $artcleOne[0]->user_id);
        $this->db->update($artcleOne[0]->userdbtable);
        
        return $point;
    }       
    
    /**
     * 아티클 삭제 스텝 2 : 포인트가 0보다 큰 게시판이라면 포인트 히스토리 작성
     */  
    public function del_article_step2($artcleOne, $point)
    {
        $breakdown = 'Furni Talk에서 운영자의 게시글 제재로 ' . $point . '포인트 차감';
        
        //에러가 나면 스텝3가 실행이 안되므로 안전하게 처리
        if ($artcleOne[0]->userdbtable == 'member') {                
            $this->db->select('usrcode, usrname');
            $this->db->from($artcleOne[0]->userdbtable);
            $this->db->where('id', $artcleOne[0]->user_id);
            $query = $this->db->get();
            $row = $query->row_array();
            
            $data = array(
                    'usrcode' => $row['usrcode'],
                    'usrname' => $row['usrname'],
                    'breakdown' => $breakdown,                    
                    'givepoint' => -$point,
                    'givewhere' => 'Furni Talk',
                    'giveuser' => '운영자',                     
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
            $this->db->insert('eggpoint', $data);
        }
        else if ($artcleOne[0]->userdbtable == 'provider') {
            $this->db->select('usrcode, corpname');
            $this->db->from($artcleOne[0]->userdbtable);
            $this->db->where('id', $artcleOne[0]->user_id);
            $query = $this->db->get();
            $row = $query->row_array();
            
            $data = array(
                    'usrcode' => $row['usrcode'],
                    'usrname' => $row['corpname'],
                    'breakdown' => $breakdown,                    
                    'givepoint' => -$point,
                    'givewhere' => 'Furni Talk',
                    'giveuser' => '운영자',                     
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
            $this->db->insert('eggpoint', $data);
        }
    }        
        
    /**
     * 아티클 삭제 스텝 3 : 최종 아티클 삭제와 통계2가지 갱신
     */  
    public function del_article_step3($article_idx, $table_name, $kind_code)
    {          
        $data = array(                                                         
                'state' => '삭제',
                'updeldate' => date('Y-m-d H:i:s')
            );
        
        $this->db->where('id', $article_idx);
        $this->db->update($table_name, $data);
        
        //통계 테이블 카운트 감소 (전체, 카테고리)
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total-1, {$kind_code} = {$kind_code}-1 WHERE identifier = '{$table_name}'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {            
            return 0;
        }              
    }
    
    /**
     * 베스트 토크 목록
     */
    public function get_besttalk_list($start_page, $limit_page, $sort_field)
    {                              
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {    
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = "WHERE " . $find_arr['srh_field'] . " LIKE '{$find_word}'";
            }                                      
        }
        
        $sort_qry = str_replace('-', ' ', $sort_field);    //talkcount-desc        
                        
        $sql = "SELECT * FROM besttalk {$find_word} ORDER BY {$sort_qry} LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);
                    
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
   /**
     * 베스트 토크 목록 로우카운트
     */
    public function get_besttalk_rowcount()
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {    
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = "WHERE " . $find_arr['srh_field'] . " LIKE '{$find_word}'";
            }                                      
        }        
        $sql = "SELECT COUNT(id) AS rowcnt FROM besttalk {$find_word}";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }
    
    /**
     * 토크 Q&A 목록
     */
    public function get_talkqna_list($start_page, $limit_page, $sort_field)
    {                                   
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {    
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = "WHERE " . $find_arr['srh_field'] . " LIKE '{$find_word}'";
            }                                      
        }
        
        $sort_qry = str_replace('-', ' ', $sort_field);    //talkcount-desc        
                        
        $sql = "SELECT * FROM talkqna {$find_word} ORDER BY {$sort_qry} LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);
                    
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
   /**
     * 토크 Q&A 로우카운트
     */
    public function get_talkqna_rowcount()
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {    
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = "WHERE " . $find_arr['srh_field'] . " LIKE '{$find_word}'";
            }                                      
        }        
        $sql = "SELECT COUNT(id) AS rowcnt FROM talkqna {$find_word}";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }    
    
    /**
     * 베스트 토크 삭제
     */
    public function del_besttalk_article($article_idx)
    {
        $this->db->where('id', $article_idx);
        $this->db->delete('besttalk');

        //통계 테이블 카운트 감소 (전체만)
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total-1 WHERE identifier = 'besttalk'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {            
            return 0;
        }
    }
    
    /**
     * Q&A의 운영자 답변글 삭제
     */
    public function del_talkqna_article($article_idx)
    {
        $data = array(                                                         
                'state' => '삭제',                                                                              
                'regip' => $this->input->ip_address(),                    
                'updeldate' => date('Y-m-d H:i:s')
            );
        $this->db->where('id', $article_idx);
        $this->db->where('kindpname', '답변');
        $this->db->update('talkqna', $data);

        //통계 테이블 카운트 감소 (전체만)
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total-1 WHERE identifier = 'talkqna'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {            
            return 0;
        }                                 
    }              
    
}