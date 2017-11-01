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

class Talkfree_model extends CI_Model 
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
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];
		if (empty($talk_code))
			$talk_kind = 'all';
		
		if ($talk_kind == 'all') {
			$this->db->select('total');
			$this->db->from('state_rowcnt');
			$this->db->where('identifier', 'talkfree');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row['total'];
		}
		else {
			$this->db->select($talk_code);
			$this->db->from('state_rowcnt');
			$this->db->where('identifier', 'talkfree');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row[$talk_code];
		}			
	}
	
	/**
	 * 키워드 검색시 아티클 로우카운트
	 */
	public function get_articlesearch_rowcount($talk_kind)
	{
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];
		if (empty($talk_code))
			$talk_kind = 'all';
		
		if ($talk_kind == 'all') {
			$this->db->select('id');
			$this->db->from('talkfree');
			$this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
			$this->db->where('state', 'O');
			return $this->db->count_all_results();
		}
		else {
			$this->db->select('id');
			$this->db->from('talkfree');
			$this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
			$this->db->where('kindcode', $talk_code);
			$this->db->where('state', 'O');
			return $this->db->count_all_results();
		}	
	}
					
	/**
	 * 아티클 목록
	 */
	public function get_article_list($start_page, $limit_page, $talk_kind)
	{		
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];    //잘못된 $talk_kind uri 입력 방지
		if (empty($talk_code))
			$talk_kind = 'all';

		if ($talk_kind == 'all') {
			$sql = "SELECT * FROM talkfree WHERE state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql);
		} 
		else {			 
			$sql = "SELECT * FROM talkfree WHERE kindcode = ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql, array($talk_code));
		}									
		
		if ($query->num_rows() > 0)
			return $query->result();	
	}
	 
	/**
	 * 아티클 목록 + 키워드 검색 
	 */
	public function get_article_search($start_page, $limit_page, $talk_kind)
	{	 	
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];    //잘못된 $talk_kind uri 입력 방지
		if (empty($talk_code))
			$talk_kind = 'all';
		
		if ($this->session->has_userdata('search_keword'))    //잘못된 srh uri 입력 방지
			$like_keyword = '%' . $this->session->userdata('search_keword') . '%';
		else
			show_404();

		if ($talk_kind == 'all') {			
			//$sql = "SELECT * FROM talkfree WHERE {$this->session->userdata('search_field')} LIKE '%' ? '%' AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$sql = "SELECT * FROM talkfree WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";									
			$query = $this->db->query($sql, array($like_keyword));
		} 
		else {			 
			$sql = "SELECT * FROM talkfree WHERE {$this->session->userdata('search_field')} LIKE ? AND kindcode = ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql, array($like_keyword, $talk_code));
		}							
		
		if ($query->num_rows() > 0)
			return $query->result();	
	}	 	
	
	/**
	 * 아티클 인서트
	 */
	public function set_article($user_id = null) 
	{
		$talk_kind_arr = define_talk_kind();
		@$talk_kind = $talk_kind_arr[$this->input->post('kind_code')];
				
		if (empty($talk_kind))
			show_404();
		
        if (empty($user_id)) {
		    $data = array(
		    		'kindcode' => $this->input->post('kind_code'),
		    		'kindpname' => $talk_kind,
		    		'title' => strip_tags(trim($this->input->post('talk_title'))),
		    		'content' => $this->input->post('talk_content'),
		    		'writer' => trim($this->input->post('guest_writer')),
		    		'user_id' => 0,
		    		'userdbtable' => '',
		    		'guestpasswd' => $this->input->post('guest_passwd'),
		    		'guestemail' => $this->input->post('guest_email'),
		    		'regip' => $this->input->ip_address(),
		    		'mentyn' => $this->input->post('ment_yn'),
		    		'srhdate' => date('Ymd'),
					'regdate' => date('Y-m-d H:i:s')
		    	);			
		}
		else {
		    $data = array(
		    		'kindcode' => $this->input->post('kind_code'),
		    		'kindpname' => $talk_kind,
		    		'title' => strip_tags(trim($this->input->post('talk_title'))),
		    		'content' => $this->input->post('talk_content'),
		    		'writer' => $this->session->userdata('user_nickname'),
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

		$this->db->insert('talkfree', $data);
		
		if ($this->db->affected_rows() == 1) {			
			$sql = "UPDATE state_rowcnt SET total = total+1, {$this->input->post('kind_code')} = {$this->input->post('kind_code')}+1 WHERE identifier = 'talkfree'";
			$this->db->query($sql);
			return $this->db->affected_rows();
		} else {
			return 0;
		}				
	}
	
	/**
	 * 아티클 업데이트
	 */
	public function set_article_update($article_idx, $user_id = null, $old_kindcode) 
	{
		$talk_kind_arr = define_talk_kind();
		@$talk_kind = $talk_kind_arr[$this->input->post('kind_code')];
				
		if (empty($talk_kind) || empty($article_idx))
			show_404();
		
        if (empty($user_id)) {
		    $data = array(
		    		'kindcode' => $this->input->post('kind_code'),
		    		'kindpname' => $talk_kind,
		    		'title' => strip_tags(trim($this->input->post('talk_title'))),
		    		'content' => $this->input->post('talk_content'),		    				    		
		    		'regip' => $this->input->ip_address(),
		    		'mentyn' => $this->input->post('ment_yn'),
		    		'updeldate' => date('Y-m-d H:i:s') 	    						
		    	);			
		}
		else {
		    $data = array(
		    		'kindcode' => $this->input->post('kind_code'),
		    		'kindpname' => $talk_kind,
		    		'title' => strip_tags(trim($this->input->post('talk_title'))),
		    		'content' => $this->input->post('talk_content'),		    		
		    		'regip' => $this->input->ip_address(),
		    		'mentyn' => $this->input->post('ment_yn'),
		    		'updeldate' => date('Y-m-d H:i:s')		    			    						
		    	);
		}

		$this->db->where('id', $article_idx);
		$this->db->update('talkfree', $data);
		
		if ($this->db->affected_rows() == 1 && $old_kindcode != $this->input->post('kind_code')) {			
			$sql = "UPDATE state_rowcnt SET {$this->input->post('kind_code')} = {$this->input->post('kind_code')}+1, {$old_kindcode} = {$old_kindcode}-1 WHERE identifier = 'talkfree'";
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
		$query = $this->db->get_where('talkfree', array('id' => $idx), 1);
		return $query->row();
	}
	
	/**
	 * 열람 조회수 카운트 증가
	 */
	public function set_readcount_increase($idx)
	{
		$this->db->set('readcount', 'readcount+1', FALSE);
		$this->db->where('id', $idx);		
		$this->db->update('talkfree');
	}
	
	/**
	 * 비회원이 쓴글인지, 그 글의 Auth까지
	 */
	public function has_article_auth($idx, $guest_email, $guest_passwd)
	{
		$query = $this->db->get_where('talkfree', array('id' => $idx, 'user_id' => 0, 'guestemail' => $guest_email, 'guestpasswd' => $guest_passwd), 1);
		return $query->row();
	}
    
    /**
     * 아티클 삭제 (실삭제 안하고 상태만 변경), 관리자에서는 상태복원시 게시물의 코멘트 총계를 바꿔야 함
     */
    public function set_article_delete($article_idx, $user_id = null, $old_kindcode)
    {
        if ($user_id == 0 || empty($user_id)) {            
            $data = array(
                    'state' => '삭제',                                                                              
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s')
                );
            $this->db->where('id', $article_idx);
            $this->db->where('user_id', 0);
        }
        else {
            $data = array(                                                         
                    'state' => '삭제',                                                                              
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s')
                );
            $this->db->where('id', $article_idx);
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->where('userdbtable', $this->session->userdata('group_table'));
        }
        
        $this->db->update('talkfree', $data);

        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total-1, {$old_kindcode} = {$old_kindcode}-1 WHERE identifier = 'talkfree'";
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
        if ($adjust == 'inc') {
            $data = array(
                    'usrcode' => $this->session->userdata('user_code'),
                    'usrname' => $this->session->userdata('user_titlename'),
                    'breakdown' => 'Furni Talk에서 게시글 등록으로 10포인트 적립',
                    'givepoint' => 10,
                    'givewhere' => 'Furni Talk',
                    'giveuser' => '자동',                     
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
            $adjust_sym = '+';            
            $this->db->insert('eggpoint', $data);
        }
        else if ($adjust == 'dec') {
            $data = array(
                    'usrcode' => $this->session->userdata('user_code'),
                    'usrname' => $this->session->userdata('user_titlename'),
                    'breakdown' => 'Furni Talk에서 게시글 삭제로 10포인트 차감',
                    'givepoint' => -10,
                    'givewhere' => 'Furni Talk',
                    'giveuser' => '자동',                     
                    'srhdate' => date('Ymd'),
                    'regdate' => date('Y-m-d H:i:s')                                
                );
            $adjust_sym = '-';            
            $this->db->insert('eggpoint', $data);
        } 
        else {
            return;
        }        
        
        if ($this->db->affected_rows() == 1 && $this->session->userdata('group_table') == 'member') {          
            $sql = "UPDATE member SET usrpoint = usrpoint{$adjust_sym}10, talkcount = talkcount{$adjust_sym}1 WHERE usrcode = '{$this->session->userdata('user_code')}'";
            $this->db->query($sql);        
        } 
        else if ($this->db->affected_rows() == 1 && $this->session->userdata('group_table') == 'provider') {            
            $sql = "UPDATE provider SET usrpoint = usrpoint{$adjust_sym}10, talkcount = talkcount{$adjust_sym}1 WHERE usrcode = '{$this->session->userdata('user_code')}'";
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
                'talk_board' => 'talkfree',
                'talk_id' => $article_idx,               
                'srhdate' => date('Ymd'),
                'regdate' => date('Y-m-d H:i:s')
            );

        $this->db->insert('talkrecomm', $data);
        
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE talkfree SET onechucnt = onechucnt+1 WHERE id = {$article_idx}";
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
        $this->db->where('talk_board', 'talkfree');
        $this->db->where('talk_id', $article_idx);
        $query = $this->db->get();

        if ($query->num_rows() > 0)   
            return TRUE;    //존재하면
        else
            return FALSE;
    }
	
}