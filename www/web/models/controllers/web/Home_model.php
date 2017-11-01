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

    public function search_product(){

          $find_word = "%" . $this->db->escape_like_str($this->input->post('keyword')) . "%";
          $find_word = "(prod.prodtitle LIKE '{$find_word}' OR prod.explain LIKE '{$find_word}' OR prod.address LIKE '{$find_word}' OR prod.brand LIKE '{$find_word}' OR prod.kindpname LIKE '{$find_word}')";

          $sql = "SELECT * FROM product AS prod WHERE {$find_word} AND state = 'O' ORDER BY id DESC LIMIT 10";

          //echo $sql;
          $query = $this->db->query($sql);

          if ($query->num_rows() > 0)
              return $query->result();

    }

    public function search_shop(){
      $find_word1 = $this->db->escape_like_str($this->input->post('keyword')) . "%";
      $find_word1 = "(shop.corpname LIKE '{$find_word1}' OR shop.hashtag LIKE '{$find_word1}' OR shop.addressjibun LIKE '{$find_word1}' OR shop.bizcategory LIKE '{$find_word1}')";

      $sql = "SELECT *
      FROM provider AS shop WHERE {$find_word1} AND shop.state = 'O' ORDER BY shop.addressjibun ASC LIMIT 10";

      //echo $sql;
      $query = $this->db->query($sql);

      if ($query->num_rows() > 0)
          return $query->result();

    }

    public function search_talk(){
      $find_word1 = $this->db->escape_like_str($this->input->post('keyword')) . "%";
      $find_word2 = "(free.title LIKE '{$find_word1}' OR free.content LIKE '{$find_word1}' OR free.writer)";
      $find_word3 = "(info.title LIKE '{$find_word1}' OR info.content LIKE '{$find_word1}' OR info.writer)";
      $find_word4 = "(photo.title LIKE '{$find_word1}' OR photo.content LIKE '{$find_word1}' OR photo.writer)";

      $sql = "(SELECT * FROM talkfree AS free WHERE {$find_word2}  ORDER BY id DESC LIMIT 10) union all (SELECT * FROM talkinfo AS info WHERE {$find_word3} ORDER BY id DESC LIMIT 10) union all (SELECT * FROM talkphoto AS photo WHERE {$find_word4} ORDER BY id DESC LIMIT 10)";
      $query = $this->db->query($sql);

      if ($query->num_rows() > 0)
          return $query->result();

    }

    public function get_talk_whole($start_page, $limit_page){
      $sql = "(SELECT * FROM talkfree WHERE state = 'O') union all (SELECT * FROM talkinfo WHERE state = 'O') union all (SELECT * FROM talkadvertise WHERE state = 'O') union all (SELECT * FROM talkphoto WHERE state = 'O')  ORDER BY regdate DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql);

      if ($query->num_rows() > 0)
        return $query->result();
    }
    public function get_talk_whole_search($start_page, $limit_page){
      if ($this->session->has_userdata('search_keword'))    //잘못된 srh uri 입력 방지
        $like_keyword = '%' . $this->session->userdata('search_keword') . '%';
      else
        show_404();


      $sql = "(SELECT * FROM talkfree WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O') UNION ALL (SELECT * FROM talkinfo WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O') UNION ALL (SELECT * FROM talkadvertise WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O') UNION ALL (SELECT * FROM talkphoto WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O') ORDER BY regdate DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql, array($like_keyword,$like_keyword,$like_keyword,$like_keyword));

      if ($query->num_rows() > 0)
        return $query->result();

    }

    public function get_talkwholesearch_rowcount(){
      $this->db->select('id');
      $this->db->from('talkfree');
      $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
      $this->db->where('state', 'O');
      $val1 = $this->db->count_all_results();

      $this->db->select('id');
      $this->db->from('talkinfo');
      $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
      $this->db->where('state', 'O');
      $val2 = $this->db->count_all_results();

      $this->db->select('id');
      $this->db->from('talkadvertise');
      $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
      $this->db->where('state', 'O');
      $val3 = $this->db->count_all_results();

      $this->db->select('id');
      $this->db->from('talkphoto');
      $this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
      $this->db->where('state', 'O');
      $val4 = $this->db->count_all_results();


      return $val1+$val2+$val3+$val4;
    }
    public function get_talkwhole_rowcount(){
    			$this->db->select('total');
    			$this->db->from('state_rowcnt');
    			$this->db->where('identifier', 'talkfree');
    			$query = $this->db->get();
    			$row = $query->row_array();

    			$this->db->select('total');
    			$this->db->from('state_rowcnt');
    			$this->db->where('identifier', 'talkinfo');
    			$query = $this->db->get();
    			$row2 = $query->row_array();

    			$this->db->select('total');
    			$this->db->from('state_rowcnt');
    			$this->db->where('identifier', 'talkphoto');
    			$query = $this->db->get();
    			$row3 = $query->row_array();

    			$this->db->select('total');
    			$this->db->from('state_rowcnt');
    			$this->db->where('identifier', 'talkadvertise');
    			$query = $this->db->get();
    			$row5 = $query->row_array();

    			return $row['total']+$row2['total']+$row3['total']+$row5['total'];
    }
}
