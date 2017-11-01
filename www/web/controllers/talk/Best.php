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

class Best extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('my_definition');
        $this->load->model('share/besttalk_model');
    		$this->load->model('web/kindcode_model');
    		$this->load->model('web/home_model');
    		$this->load->helper(array('form', 'url'));
    }

    public function article($idx = null, $taklboard_name = null, $talkboard_id = null)
    {
        if (empty($idx) || empty($taklboard_name) || empty($talkboard_id))
            show_404();

        $this->load->helper('url');
        $article_url = 'web/talk/' . substr($taklboard_name, 4) . '/article/' . $talkboard_id;


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

        $articleOne = $this->besttalk_model->get_sourearticle_one($taklboard_name, $talkboard_id);
        if (empty($articleOne)) {
                $this->besttalk_model->del_article_one($idx);
                echo '<script type="text/javascript">alert("존재하지 않거나 삭제한 게시물입니다.");</script>';
                echo '<script type="text/javascript">history.back();</script>';
        }
        else {
            $affected_rowcnt = $this->besttalk_model->set_article_copyupdate($articleOne, $idx);
            if ($affected_rowcnt == 1)
                redirect(base_url($article_url));
            else
                redirect(base_url($article_url));
        }
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

        if ($srh_mode == 'no') {
            $this->session->set_userdata('search_keword', null);
            $this->session->set_userdata('search_field', null);
        }

        if ($this->input->post('search_keword')) {
            $this->session->set_userdata('search_keword', $this->input->post('search_keword'));
            $this->session->set_userdata('search_field', $this->input->post('search_field'));
            redirect($this->config->item('base_url') . 'web/talk/best/search/' . $talk_kind . '/srh');
        }
        else {
            $paginate_url = '/web/talk/best/search/' . $talk_kind . '/' . $srh_mode;
        }

        $data['articleList'] = $this->besttalk_model->get_article_list($start_page, $limit_page, $srh_mode);
        $total_rows = $this->besttalk_model->get_article_rowcount($srh_mode);
        $data['numbering'] = $total_rows - $start_page;

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

        $this->load->view('talk/best_search', $data);
    }

    public function tobest($taklboard_name, $talkboard_idx)
    {
        if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹')
            $bulk = null;
        else
            show_404();

        if ($this->besttalk_model->has_article_being($taklboard_name, $talkboard_idx)) {
            echo '<script type="text/javascript">alert("이미 Talk Best에 등록된 게시물입니다.");</script>';
            echo '<script type="text/javascript">history.back();</script>';
            exit();
        }

        $articleOne = $this->besttalk_model->get_sourearticle_one($taklboard_name, $talkboard_idx);
        if (empty($articleOne))
            show_404();

        $affected_rowcnt = $this->besttalk_model->set_article_copy($articleOne, $taklboard_name);
        if ($affected_rowcnt == 1) {
            echo '<script type="text/javascript">alert("Talk Best에 정상적으로 등록되었습니다.");</script>';
            echo '<script type="text/javascript">history.back();</script>';
        }
        else {
            show_404();
        }
    }

    public function tobestajax($table_name, $talk_idx)
    {
        if ($this->input->method(TRUE) != 'PUT')
            exit();

        if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹')
            $bulk = null;
        else
            show_404();

        if ($this->besttalk_model->has_article_being($table_name, $talk_idx)) {
            echo '이미 Talk Best에 등록된 게시물입니다.';
        }
        else {
            $articleOne = $this->besttalk_model->get_sourearticle_one($table_name, $talk_idx);
            if (empty($articleOne))
                show_404();

            $affected_rowcnt = $this->besttalk_model->set_article_copy($articleOne, $table_name);
            if ($affected_rowcnt == 1) {
                echo 'Talk Best에 등록되었습니다.';
            }
            else {
                echo 'Talk Best에 등록할 수 없습니다.';
            }
        }
    }

}
