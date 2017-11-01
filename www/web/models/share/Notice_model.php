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

class Notice_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * 아티클 로우카운트
	 */
	public function get_article_rowcount($srh_mode = 'no')
	{
	    if ($srh_mode == 'srh') {
            $this->db->select('id');
            $this->db->from('notice');
            $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
            $this->db->where('state', 'O');
            return $this->db->count_all_results();	        
        }
        else {				
			$this->db->select('total');
			$this->db->from('state_rowcnt');
			$this->db->where('identifier', 'notice');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row['total'];
        }
	}
					
	/**
	 * 아티클 목록
	 */
	public function get_article_list($start_page, $limit_page, $srh_mode = 'no')
	{       
	    if ($srh_mode == 'srh') 
	    {	      
            if ($this->session->has_userdata('search_keword'))
                $like_keyword = '%' . $this->session->userdata('search_keword') . '%';
            else
                show_404();
            
            $sql = "SELECT * FROM notice WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";                                  
            $query = $this->db->query($sql, array($like_keyword));	        
	    }
        else {
            $sql = "SELECT * FROM notice WHERE state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql);            
        }
		
		if ($query->num_rows() > 0)
			return $query->result();	
	} 	
	
	/**
	 * 아티클 인서트
	 */
	public function set_article() 
	{
        $data = array(
                'title' => strip_tags(trim($this->input->post('talk_title'))),
                'content' => $this->input->post('talk_content'),
                'writer' => $this->session->userdata('user_nickname'),
                'user_id' => $this->session->userdata('user_id'),
                'mentyn' => $this->input->post('ment_yn'),
                'srhdate' => date('Ymd'),
				'regdate' => date('Y-m-d H:i:s')
            );

		$this->db->insert('notice', $data);
		
		if ($this->db->affected_rows() == 1) {			
			$sql = "UPDATE state_rowcnt SET total = total+1 WHERE identifier = 'notice'";
			$this->db->query($sql);
			return $this->db->affected_rows();
		} else {
			return 0;
		}				
	}
	
	/**
	 * 아티클 업데이트
	 */
	public function set_article_update($article_idx) 
	{				
		if (empty($article_idx))
			show_404();
		
        $data = array(
                'title' => strip_tags(trim($this->input->post('talk_title'))),
                'content' => $this->input->post('talk_content'),
                'mentyn' => $this->input->post('ment_yn'),
                'updeldate' => date('Y-m-d H:i:s')		    			    						
            );
            
		$this->db->where('id', $article_idx);
		$this->db->update('notice', $data);
		
        return $this->db->affected_rows();
	}

	/**
	 * 아티클 하나 가져옴
	 */
	public function get_article_one($idx)
	{
		$query = $this->db->get_where('notice', array('id' => $idx), 1);
		return $query->row();
	}
	
	/**
	 * 열람 조회수 카운트 증가
	 */
	public function set_readcount_increase($idx)
	{
		$this->db->set('readcount', 'readcount+1', FALSE);
		$this->db->where('id', $idx);		
		$this->db->update('notice');
	}
    
    /**
     * 아티클 삭제 (실삭제 안하고 상태만 변경), 관리자에서는 상태복원시 게시물의 코멘트 총계를 바꿔야 함
     */
    public function set_article_delete($article_idx)
    {
        $data = array(                                                         
                'state' => '삭제',                                                                                                  
                'updeldate' => date('Y-m-d H:i:s')
            );
                
        $this->db->where('id', $article_idx);        
        $this->db->update('notice', $data);

        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total-1 WHERE identifier = 'notice'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {            
            return 0;
        }                                 
    }    
	
}