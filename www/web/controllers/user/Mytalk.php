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

class Mytalk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('my_definition');
        $this->load->model('web/mytalk_model');
        $this->load->model('web/home_model');
        $this->load->helper('url');
    		$this->load->model('web/kindcode_model');
        if ( ! $this->session->has_userdata('user_id'))
            redirect(base_url('web/user/membership'));
    }

    public function index()
    {
        $data['talkfreeTopx'] = $this->mytalk_model->get_talkfreex();    //Furni Talk
        $data['talkqnaTopx'] = $this->mytalk_model->get_talkqnax();    //Furni Q&A
        $data['talkreviewTopx'] = $this->mytalk_model->get_talkreviewx();    //Furni Review
        $data['talkinfoTopx'] = $this->mytalk_model->get_talkinfox();    //Furni Info
        $data['talkphotoTopx'] = $this->mytalk_model->get_talkphotox();    //Furni Photo
        $data['talkadverTopx'] = $this->mytalk_model->get_talkadverx();    //Furni Ads

        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();

        //▽ Notice ───────────────────────────────────
  			$data['noticeTopx'] = $this->home_model->get_noticex();

        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();

        $this->load->view('mymy/mytalk_talk', $data);
    }

    public function talklist($talk_name = null, $srh_mode = 'no', $start_page = null)
    {
        if (empty($talk_name))
            show_404();

        $this->load->library('pagination');
        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();

        //▽ Notice ───────────────────────────────────
        $data['noticeTopx'] = $this->home_model->get_noticex();

        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();

        $limit_page = 30;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        $paginate_url = '/web/user/mytalk/talklist/' . $talk_name . '/no';
        $talk_table = 'talk' . $talk_name;
        $data['talklink'] = $talk_name;
        $data['talkname'] = df_board_title($talk_table);
        $data['mytalkList'] = $this->mytalk_model->get_mytalk_list($start_page, $limit_page, $talk_table);
        $total_rows = $this->mytalk_model->get_mytalk_rowcount($talk_table);

        $data['pagination'] = $this->_pagination_init($paginate_url, $total_rows, $limit_page);
        $this->load->view('mymy/mytalk_talk_list', $data);
    }

    public function ment()
    {
        $data['mentfreeTopx'] = $this->mytalk_model->get_mentfreex();    //Furni Talk Comment
        $data['mentqnaTopx'] = $this->mytalk_model->get_mentqnax();    //Furni Q&A Comment
        $data['mentreviewTopx'] = $this->mytalk_model->get_mentreviewx();    //Furni Review Comment
        $data['mentinfoTopx'] = $this->mytalk_model->get_mentinfox();    //Furni Info Comment
        $data['mentphotoTopx'] = $this->mytalk_model->get_mentphotox();    //Furni Photo Comment
        $data['mentadverTopx'] = $this->mytalk_model->get_mentadverx();    //Furni Ads Comment

        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();

        //▽ Notice ───────────────────────────────────
  			$data['noticeTopx'] = $this->home_model->get_noticex();

        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();
        
        $this->load->view('mymy/mytalk_comment', $data);
    }

    public function mentlist($talk_name = null, $srh_mode = 'no', $start_page = null)
    {
        if (empty($talk_name))
            show_404();

        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();

        //▽ Notice ───────────────────────────────────
  			$data['noticeTopx'] = $this->home_model->get_noticex();

        $this->load->library('pagination');

        $limit_page = 30;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        $paginate_url = '/web/user/mytalk/mentlist/' . $talk_name . '/no';
        $talk_table = 'talk' . $talk_name . '_ment';
        $data['talklink'] = $talk_name;
        $data['talkname'] = df_board_title('talk' . $talk_name);
        $data['mymentList'] = $this->mytalk_model->get_myment_list($start_page, $limit_page, $talk_table);
        $total_rows = $this->mytalk_model->get_myment_rowcount($talk_table);

        $data['pagination'] = $this->_pagination_init($paginate_url, $total_rows, $limit_page);
        $this->load->view('mymy/mytalk_comment_list', $data);
    }

    private function _pagination_init($paginate_url, $total_rows, $limit_page)
    {
        $config['base_url'] = $paginate_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit_page;
        $config['uri_segment'] = 6;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

}
