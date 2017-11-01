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

class Mytalk_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    /**
     * Furni Talk
     */
    public function get_talkfreex()
    {
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM talkfree WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
        
    /**
     * Furni Q&A
     */
    public function get_talkqnax()
    {
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM talkqna WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * Furni Review 
     */
    public function get_talkreviewx()
    {
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM talkreview WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * Furni Info 
     */
    public function get_talkinfox()
    {
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM talkinfo WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * Furni Photos
     */
    public function get_talkphotox()
    {
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM talkphoto WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * Furni Ads
     */
    public function get_talkadverx()
    {
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM talkadvertise WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 마이 작성 토크
     */
    public function get_mytalk_list($start_page, $limit_page, $talk_table)
    {
        if ($talk_table == 'talkqna')
            $talkqna_only = 'groupseq = 0 AND ';
        else
            $talkqna_only = null; 
               
        $sql = "SELECT id, title, mentcount, regdate, readcount FROM {$talk_table} 
            WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND {$talkqna_only}state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
        
        $query = $this->db->query($sql);
                    
        if ($query->num_rows() > 0)
            return $query->result();    
    }
    
   /**
     * 나의 작성 토크 로우카운트
     */
    public function get_mytalk_rowcount($talk_table)
    {
        if ($talk_table == 'talkqna')
            $talkqna_only = 'groupseq = 0 AND ';
        else
            $talkqna_only = null;
                       
        $sql = "SELECT COUNT(id) AS rowcnt FROM {$talk_table} WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND {$talkqna_only}state = 'O'";
         
        $query = $this->db->query($sql);
        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }
    
    /**
     * Furni Talk - Comment
     */
    public function get_mentfreex()
    {
        $sql = "SELECT id, talkboard_id, content, regdate FROM talkfree_ment WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    }
     
    /**
     * Furni Q&A - Comment
     */
    public function get_mentqnax()
    {
        $sql = "SELECT id, talkboard_id, content, regdate FROM talkqna_ment WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    } 
     
    /**
     * Furni Review - Comment
     */
    public function get_mentreviewx()
    {
        $sql = "SELECT id, talkboard_id, content, regdate FROM talkreview_ment WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    } 
     
    /**
     * Furni Info - Comment
     */
    public function get_mentinfox()
    {
        $sql = "SELECT id, talkboard_id, content, regdate FROM talkinfo_ment WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    } 
     
    /**
     * Furni Photos - Comment
     */
    public function get_mentphotox()
    {
        $sql = "SELECT id, talkboard_id, content, regdate FROM talkphoto_ment WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    } 
     
    /**
     * Furni Ada - Comment
     */
    public function get_mentadverx()
    {
        $sql = "SELECT id, talkboard_id, content, regdate FROM talkadvertise_ment WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT 6";
        $query = $this->db->query($sql);
        
        if ($query->num_rows() > 0)
            return $query->result();
    } 
    
    /**
     * 마이 작성 코멘트
     */
    public function get_myment_list($start_page, $limit_page, $talk_table)
    {               
        $sql = "SELECT id, talkboard_id, content, regdate FROM {$talk_table} 
            WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
        
        $query = $this->db->query($sql);
                    
        if ($query->num_rows() > 0)
            return $query->result();    
    }
    
   /**
     * 나의 작성 코멘트 로우카운트
     */
    public function get_myment_rowcount($talk_table)
    {
        $sql = "SELECT COUNT(id) AS rowcnt FROM {$talk_table} WHERE user_id = {$this->session->userdata('user_id')} AND userdbtable = '{$this->session->userdata('group_table')}' AND state = 'O'";
         
        $query = $this->db->query($sql);
        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }                        
    
}