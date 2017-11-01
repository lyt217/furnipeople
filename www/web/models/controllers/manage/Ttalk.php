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

class Ttalk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('my_definition');
        $this->load->model('manage/ttalk_model');
        if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹')
            $bulk = null;
        else
            show_404();
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');
    }


    public function articlemove($from_board, $article_idx, $to_board){
        if($this->ttalk_model->move_talk($from_board, $article_idx, $to_board) == 0){
            echo 'success';
        }
        else{
          echo 'success';
        }
    }
    /**
     * 토크 하나 삭제, Furni - Talk, Review, Info, Photos, Ads 와 Q&A의 질문글 삭제용
     */
    public function articledelete($article_idx, $table_name)
    {
        if ($this->input->method(TRUE) != 'DELETE')
            exit();

        //1. 아티클 조회해서
        $artcleOne = $this->ttalk_model->get_article_one($article_idx, $table_name);
        if ($artcleOne) {
            //회원일 경우에만 처리
            if ($artcleOne[0]->user_id > 0) {
                //2. 아티클 소유 유저 DB의 보유 아티클총수와 포인트 차감
                $point = $this->ttalk_model->del_article_step1($artcleOne, $table_name);

                //3. 포인트가 0보다 큰 게시판이라면 포인트 히스토리 작성
                if ($point > 0)
                    $this->ttalk_model->del_article_step2($artcleOne, $point);
            }

            //4. 최종 아티클 삭제와 통계2가지 갱신
            $affected_rowcnt = $this->ttalk_model->del_article_step3($article_idx, $table_name, $artcleOne[0]->kindcode);
            if ($affected_rowcnt == 1)
                echo 'success';
        }
    }

    /**
     * Furni - Talk, Review, Info, Photos, Ads 공용
     */
    public function article($article_idx, $table_name ,$sort_field = 'id-desc', $srh_mode = 'no')
    {
        $paginate_url = '/web/manage/ttalk/talkcommon/' . $table_name . '/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['tbl_name'] = $table_name;
        $data['srh_mode'] = $srh_mode;
        $data['menu_active'][$table_name] = ' class="active"';

        //▽ Get DB ───────────────────────────────────
        $data['talkList'] = $this->ttalk_model->get_article_one($article_idx, $table_name);
        $data['total_rows'] = '';
        $data['pagination'] = '';
        $this->load->view('manage/talk/talk_search_common', $data);
    }

    /**
     * Furni - Talk, Review, Info, Photos, Ads 공용
     */
    public function talkcommon($table_name = null, $sort_field = 'id-desc', $srh_mode = 'no', $start_page = null)
    {
        if (empty($table_name))
            show_404();

        $limit_page = 20;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        if ($this->input->method(TRUE) == 'POST') {
            $srh_mode = 'srh';
            $this->session->set_userdata('admin_find', $this->input->post());
        }
        else if ($srh_mode != 'srh') {
            if ($this->session->has_userdata('admin_find'))
                $this->session->set_userdata('admin_find', null);
        }
        $paginate_url = '/web/manage/ttalk/talkcommon/' . $table_name . '/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['tbl_name'] = $table_name;
        $data['srh_mode'] = $srh_mode;
        $data['menu_active'][$table_name] = ' class="active"';

        //▽ Search DB ───────────────────────────────────
        $data['talkList'] = $this->ttalk_model->get_article_list($start_page, $limit_page, $table_name, $sort_field);
        $data['total_rows'] = $this->ttalk_model->get_article_rowcount($table_name);

        //▽ Pagination & View ───────────────────────────────────
        $data['pagination'] = $this->_pagination_init($paginate_url, $data['total_rows'], $limit_page, 7);
        $this->load->view('manage/talk/talk_search_common', $data);
    }


    /** ───────────────────────────────────
     * Furni Talk Best 전용
     */
    public function besttalk($sort_field = 'id-desc', $srh_mode = 'no', $start_page = null)
    {
        $limit_page = 20;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        if ($this->input->method(TRUE) == 'POST') {
            $srh_mode = 'srh';
            $this->session->set_userdata('admin_find', $this->input->post());
        }
        else if ($srh_mode != 'srh') {
            if ($this->session->has_userdata('admin_find'))
                $this->session->set_userdata('admin_find', null);
        }
        $paginate_url = '/web/manage/ttalk/besttalk/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['srh_mode'] = $srh_mode;

        //▽ Search DB ───────────────────────────────────
        $data['talkList'] = $this->ttalk_model->get_besttalk_list($start_page, $limit_page, $sort_field);
        $data['total_rows'] = $this->ttalk_model->get_besttalk_rowcount();

        //▽ Pagination & View ───────────────────────────────────
        $data['pagination'] = $this->_pagination_init($paginate_url, $data['total_rows'], $limit_page);
        $this->load->view('manage/talk/best_search', $data);
    }

    /**
     * Furni Q&A 전용
     */
    public function articleqna($article_idx, $sort_field = 'id-desc', $srh_mode = 'no')
    {
        $paginate_url = '/web/manage/ttalk/talkqna/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['srh_mode'] = $srh_mode;

        //▽ Get DB ───────────────────────────────────
        $data['talkList'] = $this->ttalk_model->get_article_one($article_idx, 'talkqna');
        $data['total_rows'] = '';
        $data['pagination'] = '';
        $this->load->view('manage/talk/qna_search', $data);
    }

    /**
     * Furni Q&A 전용
     */
    public function talkqna($sort_field = 'id-desc', $srh_mode = 'no', $start_page = null)
    {
        $limit_page = 5;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        if ($this->input->method(TRUE) == 'POST') {
            $srh_mode = 'srh';
            $this->session->set_userdata('admin_find', $this->input->post());
        }
        else if ($srh_mode != 'srh') {
            if ($this->session->has_userdata('admin_find'))
                $this->session->set_userdata('admin_find', null);
        }
        $paginate_url = '/web/manage/ttalk/talkqna/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['srh_mode'] = $srh_mode;

        //▽ Search DB ───────────────────────────────────
        $data['talkList'] = $this->ttalk_model->get_talkqna_list($start_page, $limit_page, $sort_field);
        $data['total_rows'] = $this->ttalk_model->get_talkqna_rowcount();

        //▽ Pagination & View ───────────────────────────────────
        $data['pagination'] = $this->_pagination_init($paginate_url, $data['total_rows'], $limit_page);
        $this->load->view('manage/talk/qna_search', $data);
    }

    /**
     * Furni - Talk Best 삭제와 Q&A의 운영자답변글 삭제용
     */
    public function adminarticledelete($table_name, $article_idx)
    {
        if ($this->input->method(TRUE) != 'DELETE')
            exit();

        //테이블 네임에 따라 삭제 메서드 다르게
        $affected_rowcnt = 0;
        if ($table_name == 'besttalk') {
            $affected_rowcnt = $this->ttalk_model->del_besttalk_article($article_idx);
        }
        else if ($table_name == 'talkqna') {
            $affected_rowcnt = $this->ttalk_model->del_talkqna_article($article_idx);
        }

        if ($affected_rowcnt == 1)
            echo 'success';
    }

    /**
     * Pagination
     */
    private function _pagination_init($paginate_url, $total_rows, $limit_page, $uri_segment = 6)
    {
        $config['base_url'] = $paginate_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit_page;
        $config['uri_segment'] = $uri_segment;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = '다음';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '이전';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = '마지막';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '처음';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

}
