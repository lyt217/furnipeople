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

class Shop_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * 업체 유저 하나 가져옴
     */
    public function get_provider_one($idx)
    {
        $query = $this->db->get_where('provider', array('id' => $idx), 1);
        return $query->row();
    }

    /**
     * 포트폴리오 목록 가져옴
     */
    public function get_portfolio_list($provider_id)
    {
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('provider_id', $provider_id);
        $this->db->order_by('sortdate', 'DESC');
        $query = $this->db->get();


        if ($query->num_rows() > 0)
            return $query->result_array();
    }

    /**
    * 포트폴리오 한 개 정보 가져옴
    */
    public function get_portfolio_one($portfolio_id){
      $this->db->select('*');
      $this->db->from('portfolio');
      $this->db->where('id', $portfolio_id);
      $query = $this->db->get();

      if($query->num_rows() > 0)
        return $query->result_array();
    }
    /**
     * 포트폴리오 사진 목록 가져옴
     */
    public function get_portfolio_photo($portfolio_id)
    {
        $this->db->select('*');
        $this->db->from('portfoliophoto');
        $this->db->where('portfolio_id', $portfolio_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result_array();
    }

    /**
     * 포트폴리오 인서트
     */
    public function set_portfolio()
    {
        $data = array(
                'provider_id' => $this->session->userdata('user_id'),
                // 'imageunqname' => $uploaded_file['imageunqname'],
                // 'imagesize' => $uploaded_file['imagesize'],
                // 'imagewidth' => $uploaded_file['imagewidth'],
                // 'imageheight' => $uploaded_file['imageheight'],
                // 'devidefolder' => $uploaded_file['devidefolder'],
                // 'thumunqname' => $uploaded_file['thumunqname'],
                // 'thumsize' => $uploaded_file['thumsize'],
                // 'thumwidth' => $uploaded_file['thumwidth'],
                // 'thumheight' => $uploaded_file['thumheight'],
                'startdate' => $this->input->post('start_date'),
                'finishdate' => $this->input->post('finish_date'),
                'introduce' => strip_tags(trim($this->input->post('introduce'))),
                'sortdate' => str_replace('-', '', $this->input->post('finish_date'))
            );

        $this->db->insert('portfolio', $data);
        $portfolio_id = $this->db->insert_id();
        if($this->db->affected_rows() == 1){
          return $portfolio_id;
        }
        else{
          return 0;
        }
        // return $this->db->affected_rows();
    }
    // public function set_portfolio($uploaded_file)
    // {
    //     $data = array(
    //             'provider_id' => $this->session->userdata('user_id'),
    //             'imageunqname' => $uploaded_file['imageunqname'],
    //             'imagesize' => $uploaded_file['imagesize'],
    //             'imagewidth' => $uploaded_file['imagewidth'],
    //             'imageheight' => $uploaded_file['imageheight'],
    //             'devidefolder' => $uploaded_file['devidefolder'],
    //             'thumunqname' => $uploaded_file['thumunqname'],
    //             'thumsize' => $uploaded_file['thumsize'],
    //             'thumwidth' => $uploaded_file['thumwidth'],
    //             'thumheight' => $uploaded_file['thumheight'],
    //             'startdate' => $this->input->post('start_date'),
    //             'finishdate' => $this->input->post('finish_date'),
    //             'introduce' => strip_tags(trim($this->input->post('introduce'))),
    //             'sortdate' => str_replace('-', '', $this->input->post('finish_date'))
    //         );
    //
    //     $this->db->insert('portfolio', $data);
    //     return $this->db->affected_rows();
    // }


    /**
     * 제품 이미지정보 인서트
     */
    public function set_portfolio_photo($uploaded_files = null, $portfolio_id)
    {
        if (empty($uploaded_files)) {
    			$this->db->set('state', '대기');
    			$this->db->where('id', $portfolio_id);
    			$this->db->update('portfolio');
    			return FALSE;
        } else {
            //echo '첨부파일 있음';
            //print_r($uploaded_files);
            $this->db->insert_batch('portfoliophoto', $uploaded_files);

            $main_image = $uploaded_files[0];
            $this->db->set('imageunqname',$main_image['imageunqname']);
            $this->db->set('imagesize', $main_image['imagesize']);
            $this->db->set('imagewidth', $main_image['imagewidth']);
            $this->db->set('imageheight', $main_image['imageheight']);
            $this->db->set('devidefolder', $main_image['devidefolder']);
            $this->db->set('thumunqname', $main_image['thumunqname']);
            $this->db->set('thumsize', $main_image['thumsize']);
            $this->db->set('thumwidth', $main_image['thumwidth']);
            $this->db->set('thumheight', $main_image['thumheight']);
      			// $mainimage = $uploaded_files[0]['devidefolder'] . '/thumb/' . $uploaded_files[0]['thumunqname'];
      			// $this->db->set('mainimage', $mainimage);
      			$this->db->where('id', $portfolio_id);
      			$this->db->update('portfolio');
      			return TRUE;
        }
    }



    /**
     * 포트폴리오 하나 삭제
     */
    public function del_portfolio($portfolio_idx)
    {
        $this->db->where('id', $portfolio_idx);
        $this->db->where('provider_id', $this->session->userdata('user_id'));
        $this->db->delete('portfolio');
        return $this->db->affected_rows();
    }

    /**
     * 이 업체가 등록한 제품 몇개 가져옴
     */
    public function get_product_listx($provider_id)
    {
        $this->db->select('id, kindpname, mainimage, sellprice, brand, prodstate, prodtitle');
        $this->db->from('product');
        $this->db->where('user_id', $provider_id);
        $this->db->where('userdbtable', 'provider');
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(9);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 샵 방문 조회수 카운트 증가
     */
    public function set_readcount_increase($idx)
    {
        $this->db->set('readcount', 'readcount+1', FALSE);
        $this->db->where('id', $idx);
        $this->db->update('provider');
    }


    /**
     * 특정 프로바이더의 제품 목록
     */
    public function get_shopproduct_list($start_page, $limit_page, $provider_idx, $talk_kind)
    {
        $talk_code_arr = define_talk_code();
        @$talk_code = $talk_code_arr[$talk_kind];    //잘못된 $talk_kind uri 입력 방지
        if (empty($talk_code))
            $talk_kind = 'all';

        if ($talk_kind == 'all') {
            $sql = "SELECT * FROM product WHERE user_id = ? AND userdbtable = 'provider' AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array($provider_idx));
        }
        else {
            $sql = "SELECT * FROM product WHERE user_id = ? AND userdbtable = 'provider' AND kindcode = ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array($provider_idx, $talk_code));
        }

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 특정 프로바이더의 제품 로우카운트
     */
    public function get_shopproduct_rowcount($provider_idx, $talk_kind)
    {
        $talk_code_arr = define_talk_code();
        @$talk_code = $talk_code_arr[$talk_kind];
        if (empty($talk_code))
            $talk_kind = 'all';

        if ($talk_kind == 'all') {
            $sql = "SELECT COUNT(id) AS rowcnt FROM product WHERE user_id = ? AND userdbtable = 'provider' AND state = 'O'";
            $query = $this->db->query($sql, array($provider_idx));
        }
        else {
            $sql = "SELECT COUNT(id) AS rowcnt FROM product WHERE user_id = ? AND userdbtable = 'provider' AND kindcode = ? AND state = 'O'";
            $query = $this->db->query($sql, array($provider_idx, $talk_code));
        }

        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }

    /**
     * 특정 일반유저의 제품 목록
     */
    public function get_shopgoods_list($start_page, $limit_page, $provider_idx, $talk_kind)
    {
        $talk_code_arr = define_talk_code();
        @$talk_code = $talk_code_arr[$talk_kind];    //잘못된 $talk_kind uri 입력 방지
        if (empty($talk_code))
            $talk_kind = 'all';

        if ($talk_kind == 'all') {
            $sql = "SELECT * FROM product WHERE user_id = ? AND userdbtable = 'member' AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array($provider_idx));
        }
        else {
            $sql = "SELECT * FROM product WHERE user_id = ? AND userdbtable = 'member' AND kindcode = ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
            $query = $this->db->query($sql, array($provider_idx, $talk_code));
        }

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 특정 일반유저의 제품 로우카운트
     */
    public function get_shopgoods_rowcount($member_idx, $talk_kind)
    {
        $talk_code_arr = define_talk_code();
        @$talk_code = $talk_code_arr[$talk_kind];
        if (empty($talk_code))
            $talk_kind = 'all';

        if ($talk_kind == 'all') {
            $sql = "SELECT COUNT(id) AS rowcnt FROM product WHERE user_id = ? AND userdbtable = 'member' AND state = 'O'";
            $query = $this->db->query($sql, array($member_idx));
        }
        else {
            $sql = "SELECT COUNT(id) AS rowcnt FROM product WHERE user_id = ? AND userdbtable = 'member' AND kindcode = ? AND state = 'O'";
            $query = $this->db->query($sql, array($member_idx, $talk_code));
        }

        $row = $query->row_array();
        //echo $row['rowcnt'];
        return $row['rowcnt'];
    }

}
