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

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    $this->load->database();
		$this->load->library('session');
    $this->load->helper('my_definition');
		$this->load->model('web/home_model');
    $this->load->model('web/product_model');
		$this->load->model('web/findshop_model');
		$this->load->model('web/kindcode_model');
    $this->_alertflag_check();
	}

	public function index()
	{
	    //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();
$data['kindcode'] = $this->kindcode_model->get_kind_list();
	    //Furni Talk
		$data['talkfreeTopx'] = $this->home_model->get_talkfreex();

	    //Furni Q&A
		$data['talkqnaTopx'] = $this->home_model->get_talkqnax();

	    //Furni Review
		$data['talkreviewTopx'] = $this->home_model->get_talkreviewx();

	    //Furni Info
		$data['talkinfoTopx'] = $this->home_model->get_talkinfox();

	    //Furni Photo
		$data['talkphotoTopx'] = $this->home_model->get_talkphotox();

	    //Furni Ads
		$data['talkadverTopx'] = $this->home_model->get_talkadverx();

        //Market 제품
		$data['productTopx'] = $this->home_model->get_producx();

		//▽ Notice ───────────────────────────────────
		$data['noticeTopx'] = $this->home_model->get_noticex();
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

        //▽ View ───────────────────────────────────
		$this->load->view('home/main_home', $data);
	}

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

    		public function unitysearch(){
    			$this->load->helper(array('form', 'url'));
    			$this->load->library('pagination');

    			//Furni Best
    			$data['talkbestTopx'] = $this->home_model->get_talkbestx();

    			//Furni Talk
    			$data['talkfreeTopx'] = $this->home_model->get_talkfreex();

    			//Furni Q&A
    			$data['talkqnaTopx'] = $this->home_model->get_talkqnax();

    			//Furni Review
    			$data['talkreviewTopx'] = $this->home_model->get_talkreviewx();

    			//Furni Info
    			$data['talkinfoTopx'] = $this->home_model->get_talkinfox();

    			//Furni Photo
    			$data['talkphotoTopx'] = $this->home_model->get_talkphotox();

    			//Furni Ads
    			$data['talkadverTopx'] = $this->home_model->get_talkadverx();

    			//Market 제품
    			$data['productTopx'] = $this->home_model->get_producx();

    			//가구 종류 data
    			$data['kindcode'] = $this->kindcode_model->get_kind_list();

    			//Market 검색
    			$data['searchProduct'] = $this->home_model->search_product();

    			$data['kword'] = $this->input->post('keyword');


    			//Talk 검색
    			$data['searchTalk'] = $this->home_model->search_talk();

    			//업체 검색
    			$data['searchShop'] = $this->home_model->search_shop();

    			//▽ Notice ───────────────────────────────────
    			$data['noticeTopx'] = $this->home_model->get_noticex();
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
    			$this->load->view('home/searchresult', $data);
    		}
}
