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

class Talkqna_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * 아티클 로우카운트
     */
    public function get_article_rowcount($talk_kind)
    {
        if ($talk_kind == 'all') {
            $this->db->select('total');
            $this->db->from('state_rowcnt');
            $this->db->where('identifier', 'talkqna');
            $query = $this->db->get();
            $row = $query->row_array();
            return $row['total'];
        }
        else {
            $this->db->select(df_uri_talkcode($talk_kind));
            $this->db->from('state_rowcnt');
            $this->db->where('identifier', 'talkqna');
            $query = $this->db->get();
            $row = $query->row_array();
            return $row[df_uri_talkcode($talk_kind)];
        }           
    }
    
    /**
     * 키워드 검색시 아티클 로우카운트
     */
    public function get_articlesearch_rowcount($talk_kind)
    {
        if ($talk_kind == 'all') {
            $this->db->select('id');
            $this->db->from('talkqna');
            $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
            return $this->db->count_all_results();
        }
        else {
            $this->db->select('id');
            $this->db->from('talkqna');
            $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
            $this->db->where('kindcode', df_uri_talkcode($talk_kind));
            return $this->db->count_all_results();
        }   
    }
                    
    /**
     * 아티클 목록
     */
    public function get_article_list($start_page, $limit_page, $talk_kind)
    {       
        if ($talk_kind == 'all') {
            $sql = "SELECT * FROM talkqna ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql);
        } 
        else {           
            $sql = "SELECT * FROM talkqna WHERE kindcode = ? ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array(df_uri_talkcode($talk_kind)));
        }
                                
        if ($query->num_rows() > 0)
            return $query->result();    
    }
     
    /**
     * 아티클 목록 + 키워드 검색 
     */
    public function get_article_search($start_page, $limit_page, $talk_kind)
    {
        if ($this->session->has_userdata('search_keword'))    //잘못된 srh uri 입력 방지
            $like_keyword = '%' . $this->session->userdata('search_keword') . '%';
        else
            show_404();

        if ($talk_kind == 'all') {          
            $sql = "SELECT * FROM talkqna WHERE {$this->session->userdata('search_field')} LIKE ? ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array($like_keyword));
        } 
        else {           
            $sql = "SELECT * FROM talkqna WHERE {$this->session->userdata('search_field')} LIKE ? AND kindcode = ? ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array($like_keyword, df_uri_talkcode($talk_kind)));
        }                           
        
        if ($query->num_rows() > 0)
            return $query->result();    
    }       
    
    /**
     * 질문 아티클 인서트
     */
    public function set_root_article() 
    {       
        if ($this->session->has_userdata('user_id')) {
            $data = array(
                    'kindcode' => $this->input->post('kind_code'),
                    'kindpname' => df_talkcode_kname($this->input->post('kind_code')),
                    'writer' => $this->session->userdata('user_nickname'),                                  
                    'title' => strip_tags(trim($this->input->post('talk_title'))),                    
                    'question' => $this->input->post('talk_content'),
                    'questionsrh' => strip_tags(trim($this->input->post('talk_content'))),
                    'user_id' => $this->session->userdata('user_id'),
                    'userdbtable' => $this->session->userdata('group_table'),
                    'guestpasswd' => '',
                    'guestemail' => '',
                    'regip' => $this->input->ip_address(),
                    'mentyn' => $this->input->post('ment_yn'),
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                                    
                );
        }
        else {
            $data = array(
                    'kindcode' => $this->input->post('kind_code'),
                    'kindpname' => df_talkcode_kname($this->input->post('kind_code')),
                    'writer' => strip_tags(trim($this->input->post('guest_writer'))),                                      
                    'title' => strip_tags(trim($this->input->post('talk_title'))),                    
                    'question' => $this->input->post('talk_content'),
                    'questionsrh' => strip_tags(trim($this->input->post('talk_content'))),                    
                    'user_id' => 0,
                    'userdbtable' => '',
                    'guestpasswd' => strip_tags(trim($this->input->post('guest_passwd'))),
                    'guestemail' => strip_tags(trim($this->input->post('guest_email'))),
                    'regip' => $this->input->ip_address(),
                    'mentyn' => $this->input->post('ment_yn'),
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
        }

        $this->db->insert('talkqna', $data);

        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total+1, {$this->input->post('kind_code')} = {$this->input->post('kind_code')}+1 WHERE identifier = 'talkqna'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }
    
    /**
     * 질문 아티클 업데이트
     */
    public function set_article_update($article_idx, $old_kindcode, $mentcount, $mentyn) 
    {
        if ($this->session->has_userdata('user_id')) {
            $data = array(
                    'kindcode' => $this->input->post('kind_code'),
                    'kindpname' => df_talkcode_kname($this->input->post('kind_code')),
                    'title' => strip_tags(trim($this->input->post('talk_title'))),                    
                    'question' => $this->input->post('talk_content'),
                    'questionsrh' => strip_tags(trim($this->input->post('talk_content'))),                   
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s'),
                    'mentyn' => ($mentcount == 0) ? $this->input->post('ment_yn') : $mentyn                    
                );
        }
        else {
            $data = array(
                    'kindcode' => $this->input->post('kind_code'),
                    'kindpname' => df_talkcode_kname($this->input->post('kind_code')),
                    'title' => strip_tags(trim($this->input->post('talk_title'))),                    
                    'question' => $this->input->post('talk_content'),
                    'questionsrh' => strip_tags(trim($this->input->post('talk_content'))),                                       
                    'regip' => $this->input->ip_address(),
                    'updeldate' => date('Y-m-d H:i:s'),
                    'mentyn' => ($mentcount == 0) ? $this->input->post('ment_yn') : $mentyn                               
                );
        }          

        $this->db->where('id', $article_idx);
        $this->db->update('talkqna', $data);
        
        if ($this->db->affected_rows() == 1 && $old_kindcode != $this->input->post('kind_code')) {          
            $sql = "UPDATE state_rowcnt SET {$this->input->post('kind_code')} = {$this->input->post('kind_code')}+1, {$old_kindcode} = {$old_kindcode}-1 WHERE identifier = 'talkqna'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else if ($this->db->affected_rows() == 1 && $old_kindcode == $this->input->post('kind_code')) {
            return $this->db->affected_rows();
        } else {            
            return 0;
        }               
    }

    /**
     * 아티클 하나 가져옴
     */
    public function get_article_one($idx)
    {
        $query = $this->db->get_where('talkqna', array('id' => $idx), 1);
        return $query->row();
    }

    /**
     * 운영자 답변 저장
     */ 
    public function set_answer_article($article_idx) 
    {                
        $data = array(        
                'answertitle' => strip_tags(trim($this->input->post('talk_title'))),
                'answer' => $this->input->post('talk_content'),
                'answersrh' => strip_tags(trim($this->input->post('talk_content')))                
            );
        $this->db->where('id', $article_idx);
        $this->db->update('talkqna', $data);
        return $this->db->affected_rows();
    }

    /**
     * 운영자 답변 클리어
     */
    public function set_answerarticle_delete($article_idx)
    {                
        $data = array(        
                'answertitle' => null,
                'answer' => null,
                'answersrh' => null                
            );
        $this->db->where('id', $article_idx);
        $this->db->update('talkqna', $data);
        return $this->db->affected_rows();
    }    
    
    /**
     * 열람 조회수 카운트 증가
     */
    public function set_readcount_increase($idx)
    {
        $this->db->set('readcount', 'readcount+1', FALSE);
        $this->db->where('id', $idx);       
        $this->db->update('talkqna');
    }
    
    /**
     * 비회원이 쓴글인지, 그 글의 Auth까지
     */
    public function has_article_auth($idx, $guest_email, $guest_passwd)
    {
        $query = $this->db->get_where('talkqna', array('id' => $idx, 'user_id' => 0, 'guestemail' => $guest_email, 'guestpasswd' => $guest_passwd), 1);
        return $query->row();
    }
    
    /**
     * 아티클 삭제
     */
    public function set_article_delete($article_idx, $user_id = null, $old_kindcode)
    {
        if ($user_id == 0 || empty($user_id)) {
            $this->db->where('id', $article_idx);
            $this->db->where('user_id', 0);
        }
        else {
            $this->db->where('id', $article_idx);
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('userdbtable', $this->session->userdata('group_table'));
        }
                
        $this->db->delete('talkqna');

        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total-1, {$old_kindcode} = {$old_kindcode}-1 WHERE identifier = 'talkqna'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {            
            return 0;
        }                                 
    }
     
    /**
     * 마이포인트 적용
     */
    public function set_mypoint($adjust)
    {
        $point = df_furni_point('talkqna');
                
        if ($adjust == 'inc') {
            $data = array(
                    'usrcode' => $this->session->userdata('user_code'),
                    'usrname' => $this->session->userdata('user_titlename'),
                    'breakdown' => 'Furni Q&A에서 게시글 등록으로 ' . $point . '포인트 적립',
                    'givepoint' => $point,
                    'givewhere' => 'Furni Q&A',
                    'giveuser' => '자동',                     
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
            $adj_point = 'usrpoint+' . $point;
            $adj_talkcnt = 'talkcount+1';
            $this->db->insert('eggpoint', $data);
        }
        else if ($adjust == 'dec') {
            $data = array(
                    'usrcode' => $this->session->userdata('user_code'),
                    'usrname' => $this->session->userdata('user_titlename'),
                    'breakdown' => 'Furni Q&A에서 게시글 삭제로 ' . $point . '포인트 차감',
                    'givepoint' => -$point,
                    'givewhere' => 'Furni Q&A',
                    'giveuser' => '자동',                     
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
            $adj_point = 'usrpoint-' . $point;
            $adj_talkcnt = 'talkcount-1';
            $this->db->insert('eggpoint', $data);
        } 
        else {
            return;
        }        
        
        if ($this->db->affected_rows() == 1 && $this->session->userdata('group_table') == 'member') {          
            $sql = "UPDATE member SET usrpoint = {$adj_point}, talkcount = {$adj_talkcnt} WHERE usrcode = '{$this->session->userdata('user_code')}'";
            $this->db->query($sql);        
        } 
        else if ($this->db->affected_rows() == 1 && $this->session->userdata('group_table') == 'provider') {            
            $sql = "UPDATE provider SET usrpoint = {$adj_point}, talkcount = {$adj_talkcnt} WHERE usrcode = '{$this->session->userdata('user_code')}'";
            $this->db->query($sql);                        
        }    
    }

    /**
     * 아티클 추천 히스토리로 쌓고, 아티클에 추천수 증가
     */
    public function set_recomm($article_idx)
    {                                          
        $data = array(
                'usrcode' => $this->session->userdata('user_code'),
                'talk_board' => 'talkqna',
                'talk_id' => $article_idx,               
                'srhdate' => date('Ymd'),
                'regdate' => date('Y-m-d H:i:s')
            );

        $this->db->insert('talkrecomm', $data);
        
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE talkqna SET onechucnt = onechucnt+1 WHERE id = {$article_idx}";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }
    
   /**
     * 이미 추천한 이력이 있는 아티클인지 확인      
     */
    public function has_recomm_being($article_idx)
    {       
        $this->db->select('id');
        $this->db->from('talkrecomm');
        $this->db->where('talk_board', 'talkqna');
        $this->db->where('talk_id', $article_idx);
        $query = $this->db->get();

        if ($query->num_rows() > 0)   
            return TRUE;
        else
            return FALSE;
    }
    
}