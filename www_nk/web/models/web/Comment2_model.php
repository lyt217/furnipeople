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

class Comment2_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
					
	/**
	 * 코멘트 목록
	 */
	public function get_ment_list($start_page, $limit_page, $talkboard_table, $talkboard_id)
	{
	    $talkment_table = $talkboard_table . '_ment';
                
		$sql = "SELECT * FROM {$talkment_table} WHERE talkboard_id = {$talkboard_id} AND state = 'O' ORDER BY groupid ASC LIMIT {$start_page}, {$limit_page}";
		$query = $this->db->query($sql);
										
		if ($query->num_rows() > 0)
			return $query->result();	
	}	
        
    /**
     * 루트 코멘트 인서트
     */
    public function set_root_ment($talkboard_table, $talkboard_id, $guest = null) 
    {
    	$talkment_table = $talkboard_table . '_ment';
		                       
        if ($guest == 'guest') {
            //echo '비로그인한 게스트';
            $data = array(                    
                    'talkboard_id' => $talkboard_id,
                    'groupid' => 0,                    
                    'grouplevel' => 0,
                    'content' => strip_tags(trim($this->input->post('comment'))),
                    'writer' => trim($this->input->post('writer')),
                    'user_id' => 0,
                    'userdbtable' => '',
                    'guestpasswd' => strtolower(trim($this->input->post('passwd'))),
                    'guestemail' => strtolower(trim($this->input->post('email'))),
                    'regip' => $this->input->ip_address(),
                    'srhdate' => date('Ymd')
                );
        }
        else {
            //echo '로그인한 유저';
            $data = array(                    
                    'talkboard_id' => $talkboard_id,
                    'groupid' => 0,                    
                    'grouplevel' => 0,                    
                    'content' => strip_tags(trim($this->input->post('comment'))),
                    'writer' => $this->session->userdata('user_nickname'),
                    'user_id' => $this->session->userdata('user_id'),
                    'userdbtable' => $this->session->userdata('group_table'),
                    'guestpasswd' => '',
                    'guestemail' => '',
                    'regip' => $this->input->ip_address(),                    
                    'srhdate' => date('Ymd')                                                    
                );
        }

        $this->db->insert($talkment_table, $data);
  
        $groupid = $this->db->insert_id();
        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE {$talkment_table} SET groupid = {$groupid} WHERE id = {$groupid}";
            $this->db->query($sql);
            
            $sql = "UPDATE {$talkboard_table} SET mentcount = mentcount+1 WHERE id = {$talkboard_id}";
            $this->db->query($sql);
            
            return $this->db->affected_rows();  
        } else {
            return 0;
        }              
    }

    /**
     * Ajax에서 코멘트 페이지를 Call할때는 로우카운트를 여기서 가져옴
     */
    public function get_ment_rowcount($talkboard_table, $talkboard_id)
    {       
        $this->db->select('mentcount');
        $this->db->from($talkboard_table);
        $this->db->where('id', $talkboard_id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['mentcount'];
    }
    
    /**
     * 종속 자식 코멘트 인서트
     */
    public function set_child_ment($talkboard_table, $ment_id, $talkboard_id, $guest = null)
    {
        $talkment_table = $talkboard_table . '_ment';

        //먼저 누구에 대한 답글인지 파악하기 위해                       
        $this->db->select('groupid, grouplevel, writer');
        $this->db->from($talkment_table);
        $this->db->where('id', $ment_id);
        $query = $this->db->get();
        $row = $query->row_array();

        if ($row['grouplevel'] == 1)
            $toyou = $row['writer'];
        else
            $toyou = '';
        
        if ($query->num_rows() > 0) 
        {
            if ($guest == 'guest') {                           
                $data = array(
                        'talkboard_id' => $talkboard_id,
                        'groupid' => $row['groupid'],                    
                        'grouplevel' => 1,
                        'toyou' => $toyou,                    
                        'content' => strip_tags(trim($this->input->post('comment'))),
                        'writer' => trim($this->input->post('writer')),
                        'user_id' => 0,
                        'userdbtable' => '',
                        'guestpasswd' => strtolower(trim($this->input->post('passwd'))),
                        'guestemail' => strtolower(trim($this->input->post('email'))),
                        'regip' => $this->input->ip_address(),                    
                        'srhdate' => date('Ymd')
                    );
            } else {
                $data = array(
                        'talkboard_id' => $talkboard_id,
                        'groupid' => $row['groupid'],                    
                        'grouplevel' => 1,
                        'toyou' => $toyou,                    
                        'content' => strip_tags(trim($this->input->post('comment'))),
                        'writer' => $this->session->userdata('user_nickname'),
                        'user_id' => $this->session->userdata('user_id'),
                        'userdbtable' => $this->session->userdata('group_table'),
                        'guestpasswd' => '',
                        'guestemail' => '',
                        'regip' => $this->input->ip_address(),                    
                        'srhdate' => date('Ymd')
                    );
            }

            $this->db->insert($talkment_table, $data);;
            
            if ($this->db->affected_rows() == 1) {                
                $sql = "UPDATE {$talkboard_table} SET mentcount = mentcount+1 WHERE id = {$talkboard_id}";
                $this->db->query($sql);
                return 'ok';
            } else {
                return 'fail';
            }
        }
    }

    /**
     * 코멘트 업데이트
     */
    public function set_ment_update($talkboard_table, $ment_id, $guest = null)
    {
        $talkment_table = $talkboard_table . '_ment';
        
        if ($guest == 'guest') {
            $query = $this->db->get_where($talkment_table, array('id' => $ment_id), 1);
            $row = $query->row_array();
            if ($row['writer'] != trim($this->input->post('writer')) || $row['guestpasswd'] != strtolower(trim($this->input->post('passwd'))) || $row['guestemail'] != strtolower(trim($this->input->post('email'))))
                return 'different';

            $data = array(                                                         
                    'content' => strip_tags(trim($this->input->post('comment'))),                                                                                
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s')
                );
        }
        else {
            $query = $this->db->get_where($talkment_table, array('id' => $ment_id), 1);
            $row = $query->row_array();
            if ($row['userdbtable'] != $this->session->userdata('group_table') || $row['user_id'] != $this->session->userdata('user_id'))
                return 'fail';

            $data = array(                                                         
                    'content' => strip_tags(trim($this->input->post('comment'))),
                    'writer' => $this->session->userdata('user_nickname'),                                                                                
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s')
                );
        }          
        
        $this->db->where('id', $ment_id);
        $this->db->update($talkment_table, $data);
                
        if ($this->db->affected_rows() == 1)
            return 'ok';
        else
            return 'fail';
    }


    /**
     * 코멘트 삭제 (실삭제 안하고 상태만 변경), 관리자에서는 상태복원시 게시물의 코멘트 총계를 바꿔야 함
     */
    public function set_ment_delete($talkboard_table, $ment_id, $talkboard_id, $guest = null)
    {
        $talkment_table = $talkboard_table . '_ment';
        
        if ($guest == 'guest') {
            $query = $this->db->get_where($talkment_table, array('id' => $ment_id), 1);
            $row = $query->row_array();
            if ($row['writer'] != trim($this->input->post('writer')) || $row['guestpasswd'] != strtolower(trim($this->input->post('passwd'))) || $row['guestemail'] != strtolower(trim($this->input->post('email'))))
                return 'different';
            
            $data = array(                                                         
                    'state' => '삭제',                                                                              
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s')
                );            
        }
        else {
            $query = $this->db->get_where($talkment_table, array('id' => $ment_id), 1);
            $row = $query->row_array();
            if ($row['userdbtable'] != $this->session->userdata('group_table') || $row['user_id'] != $this->session->userdata('user_id'))
                return 'fail';

            $data = array(                                                         
                    'state' => '삭제',                                                                              
                    'regip' => $this->input->ip_address(),                    
                    'updeldate' => date('Y-m-d H:i:s')
                );
        }          
        
        $this->db->where('id', $ment_id);
        $this->db->update($talkment_table, $data);

        if ($this->db->affected_rows() == 1) {                
            $sql = "UPDATE {$talkboard_table} SET mentcount = mentcount-1 WHERE id = {$talkboard_id}";
            $this->db->query($sql);
            return 'ok';
        } else {
            return 'fail';
        }        
    }  
        
}
    