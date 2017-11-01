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

class Mmember_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 회원 목록
     */
    public function get_member_list($start_page, $limit_page, $sort_field)
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
            }
        }
        $sort_qry = str_replace('-', ' ', $sort_field);    //talkcount-desc
        $sql = "SELECT * FROM member WHERE {$find_word}state = 'O' ORDER BY {$sort_qry} LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
            return $query->result();
    }

    public function get_point_list($start_page, $limit_page)
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
            }
        }
        $sql = "(SELECT id, groupid, emailid, usrcode, usrname as name, nickname as nickname, phone, state, logindate, logincount, goodscount, regdate, updeldate, usrpoint FROM member WHERE {$find_word}state = 'O') UNION ALL (SELECT id, groupid, emailid, usrcode, corpname as name, nickname as nickname, mobile as phone, state, logindate, logincount, goodscount, regdate, updeldate, usrpoint FROM provider WHERE {$find_word}state = '0') ORDER BY usrpoint LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
            return $query->result();
    }

    public function get_point_rowcount(){
      $find_word = null;
      if ($this->session->has_userdata('admin_find')) {
          $find_arr = $this->session->userdata('admin_find');

          if ($find_arr['find_word'] != '') {
              $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
              $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
          }
      }
      $sql = "SELECT COUNT(id) AS rowcnt FROM member WHERE {$find_word}state = 'O'";
      $query = $this->db->query($sql);
      $row = $query->row_array();

      $sql2 = "SELECT COUNT(id) AS rowcnt FROM provider WHERE {$find_word}state = 'O'";
      $query2 = $this->db->query($sql2);
      $row2 = $query2->row_array();

      return $row['rowcnt'] + $row2['rowcnt'];
    }
   /**
     * 회원 로우카운트
     */
    public function get_member_rowcount()
    {
        $find_word = null;
        if ($this->session->has_userdata('admin_find')) {
            $find_arr = $this->session->userdata('admin_find');

            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = $find_arr['srh_field'] . " LIKE '{$find_word}' AND ";
            }
        }
        $sql = "SELECT COUNT(id) AS rowcnt FROM member WHERE {$find_word}state = 'O'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }

    /**
     * 회원 한명 가져옴
     */
    public function get_member_one($user_idx)
    {
        $query = $this->db->get_where('member', array('id' => $user_idx), 1);
        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 만일 일치하는 유저정보가 있으면 로그인 성공 세션에 저장할 항목들을 가져감
     */
    public function get_auth_member($email_id)
    {
        $sql = "SELECT m.id, m.usrname, m.nickname, m.emailid, m.usrcode, m.passwd, g.middlekind, g.userdbtable
            FROM member AS m JOIN grouptoken AS g
            ON m.groupid = g.groupid AND m.emailid = ? LIMIT 1";

        $email_id = strtolower($email_id);
        $query = $this->db->query($sql, array($email_id));
        return $query->row();
    }
    /**
     * 회원 강제 탈퇴
     */
    public function del_user($user_idx)
    {
        $data = array(
                'usrname' => '강제탈퇴',
                'nickname' => '',
                'phone' => '',
                'updeldate' => date('Y-m-d H:i:s'),
                'state' => '탈퇴'
            );

        $this->db->where('id', $user_idx);
        $this->db->update('member', $data);
        return $this->db->affected_rows();
    }


}
