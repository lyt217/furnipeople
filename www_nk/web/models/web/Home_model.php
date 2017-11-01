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

class Home_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Furni Best
     */
    public function get_talkbestx()
    {
        $this->db->select('id, taklboard_name, talkboard_id, title, mentcount');
        $this->db->from('besttalk');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Furni Talk
     */
    public function get_talkfreex()
    {
        $this->db->select('id, title, mentcount');
        $this->db->from('talkfree');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Furni Q&A
     */
    public function get_talkqnax()
    {
        $this->db->select('id, title, mentcount');
        $this->db->from('talkqna');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Furni Review
     */
    public function get_talkreviewx()
    {
        $this->db->select('id, title, mentcount');
        $this->db->from('talkreview');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Furni Info
     */
    public function get_talkinfox()
    {
        $this->db->select('id, title, mentcount');
        $this->db->from('talkinfo');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Furni Photo
     */
    public function get_talkphotox()
    {
        $this->db->select('id, title, mentcount');
        $this->db->from('talkphoto');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Furni Ads
     */
    public function get_talkadverx()
    {
        $this->db->select('id, title, mentcount');
        $this->db->from('talkadvertise');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }
    
    /**
     * Market 제품
     */
    public function get_producx()
    {
        $this->db->select('id, prodtitle, kindpname, mainimage, sellprice, brand, prodstate');
        $this->db->from('product');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(9);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

	/**
     * Notice
     */
    public function get_noticex()
    {
        $this->db->select('id, title');
        $this->db->from('notice');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 신규 쪽지 갯수 플래거 체크
     */
    public function get_alertflag_check()
    {
        $this->db->select('newcount');
        $this->db->from('chattflag');
        $this->db->where('receivercode', $this->session->userdata('user_code'));
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $row = $query->row_array();
            return $row['newcount'];
        } else {
            return 0;
        }        
    }
	
}