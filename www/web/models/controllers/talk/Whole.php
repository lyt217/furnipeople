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

class Whole extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->database();
		$this->load->library('session');
    $this->load->helper('my_definition');
		$this->load->model('web/home_model');
    $this->load->model('web/product_model');
		$this->load->model('web/kindcode_model');
		$this->_alertflag_check();
	}

  public function search($talk_kind = 'all', $srh_mode = 'no', $start_page = null)
  {
    $this->load->helper(array('form', 'url'));
    $this->load->library('pagination');

    $limit_page = 20;


    //Furni Best
    $data['talkbestTopx'] = $this->home_model->get_talkbestx();
    //▽ Notice ───────────────────────────────────
    $data['noticeTopx'] = $this->home_model->get_noticex();
    //가구 종류 data
    $data['kindcode'] = $this->kindcode_model->get_kind_list();

        if ($this->session->has_userdata('notice_html')) {
            if ($data['noticeTopx'][0]->id > $this->session->userdata('notice_html')[0]['newid']) {
                $notice = array();
                for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                    $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                    $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                    $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                }
                $this->session->set_userdata('notice_html', $notice);
            }
        }
        else {
            $notice = array();
            for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
            }
            $this->session->set_userdata('notice_html', $notice);
        }

    if (empty($start_page))
      $start_page = 0;
    else
      $start_page = ($start_page - 1) * $limit_page;

    $talk_code_arr = define_talk_code();

    foreach($talk_code_arr as $key => $value)
        $data['talkind_btn'][$value] = 'btn-u btn-u-xs btn-brd btn-brd-hover rounded-3x btn-u-brown text-bold';

    if ($srh_mode == 'no') {
      $this->session->set_userdata('search_keword', null);
      $this->session->set_userdata('search_field', null);
    }

    if ($this->input->post('search_keword')) {
      $this->session->set_userdata('search_keword', $this->input->post('search_keword'));
      $this->session->set_userdata('search_field', $this->input->post('search_field'));
      redirect($this->config->item('base_url') . 'web/talk/whole/search/all/srh');
    }
    else {
      $paginate_url = '/web/talk/whole/search/all/no';
    }

    if ($srh_mode == 'srh') {
      $data['articleList'] = $this->home_model->get_talk_whole_search($start_page, $limit_page);
      $total_rows = $this->home_model->get_talkwholesearch_rowcount();
      $data['numbering'] = $total_rows - $start_page;
    }
    else {
      $data['articleList'] = $this->home_model->get_talk_whole($start_page, $limit_page);
      $total_rows = $this->home_model->get_talkwhole_rowcount();
      $data['numbering'] = $total_rows - $start_page;
    }

    $config['base_url'] = $paginate_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $limit_page;
    $config['use_page_numbers'] = TRUE;
    $config['uri_segment'] = 6;

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
    $data['pagination'] = $this->pagination->create_links();

    $this->load->view('talk/whole_search', $data);
  }
  //
	// public function index()
	// {
  //   //전체 게시글
  //   $data['talkwhole'] = $this->home_model->get_talk_whole();
  //
  //
  //   //Furni Best
  //   $data['talkbestTopx'] = $this->home_model->get_talkbestx();
  //
  //   //Market 제품
	// 	$data['productTopx'] = $this->home_model->get_producx();
  //
	// 	//가구 종류 data
	// 	$data['kindcode'] = $this->kindcode_model->get_kind_list();
  //
	// 	//▽ Notice ───────────────────────────────────
	// 	$data['noticeTopx'] = $this->home_model->get_noticex();
  //       if ($this->session->has_userdata('notice_html')) {
  //           if ($data['noticeTopx'][0]->id > $this->session->userdata('notice_html')[0]['newid']) {
  //               $notice = array();
  //               for ($i = 0; $i < count($data['noticeTopx']); $i++) {
  //                   $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
  //                   $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
  //                   $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
  //               }
  //               $this->session->set_userdata('notice_html', $notice);
  //           }
  //       }
  //       else {
  //           $notice = array();
  //           for ($i = 0; $i < count($data['noticeTopx']); $i++) {
  //               $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
  //               $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
  //               $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
  //           }
  //           $this->session->set_userdata('notice_html', $notice);
  //       }
  //
  //       //▽ View ───────────────────────────────────
	// 	$this->load->view('talk/whole_search', $data);
	// }

    private function _alertflag_check()
    {
        if ($this->session->has_userdata('msgalert_box'))
        {
            if ($this->input->cookie('msgalert_time')) {
                $old_time = new DateTime($this->input->cookie('msgalert_time'));
                $current_time = new DateTime(date('Y-m-d H:i:s'));
                $diff = date_diff($old_time, $current_time);
                if ($diff->i > 5) {
                    $newcount = $this->home_model->get_alertflag_check();
                    if ($newcount > 0)
                        $this->session->set_userdata('msgalert_box', $newcount);

                    $cookie = array(
                            'name'   => 'msgalert_time',
                            'value'  => date('Y-m-d H:i:s'),
                            'expire' => '0',
                            'domain' => '.furnipeople.com',
                            'path'   => '/',
                            'prefix' => '',
                            'secure' => FALSE
                    );
                    $this->input->set_cookie($cookie);
                }
            }
            else {
                $cookie = array(
                        'name'   => 'msgalert_time',
                        'value'  => date('Y-m-d H:i:s'),
                        'expire' => '0',
                        'domain' => '.furnipeople.com',
                        'path'   => '/',
                        'prefix' => '',
                        'secure' => FALSE
                );
                $this->input->set_cookie($cookie);
            }
        }
    }

}
