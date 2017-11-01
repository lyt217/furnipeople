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

class Mmember extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('manage/mmember_model');
        if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹')
            $bulk = null;
        else
            show_404();
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');
    }

    /**
     * ───────────────────────────────────
     * 일반 회원 관리
     * ───────────────────────────────────
     */

    public function search($sort_field = 'id-desc', $srh_mode = 'no', $start_page = null)
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
        $paginate_url = '/web/manage/mmember/search/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['srh_mode'] = $srh_mode;

        //▽ Search DB ───────────────────────────────────
        $data['userList'] = $this->mmember_model->get_member_list($start_page, $limit_page, $sort_field);
        $total_rows = $this->mmember_model->get_member_rowcount();

        //▽ Pagination & View ───────────────────────────────────
        $data['pagination'] = $this->_pagination_init($paginate_url, $total_rows, $limit_page);
        $this->load->view('manage/user/member_search', $data);
    }

    public function memberdelete($user_idx){
      $result = $this->mmember_model->del_user($user_idx);

      echo "success";
    }
    public function user($user_idx, $sort_field = 'id-desc', $srh_mode = 'no')
    {
        $paginate_url = '/web/manage/mmember/search/' . $sort_field . '/' . $srh_mode;
        $data['action_url'] = $paginate_url;
        $data['srh_mode'] = $srh_mode;

        //▽ Get DB ───────────────────────────────────
        $data['userList'] = $this->mmember_model->get_member_one($user_idx);
        $data['pagination'] = '';
        $this->load->view('manage/user/member_search', $data);
    }

    private function _pagination_init($paginate_url, $total_rows, $limit_page)
    {
        $config['base_url'] = $paginate_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit_page;
        $config['uri_segment'] = 6;
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

    public function point($month = 0, $start_page = null)
    {
        $limit_page = 20;
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        if ($this->input->method(TRUE) == 'POST') {
            // $month = 1;
            $this->session->set_userdata('admin_find', $this->input->post());
        }
        else if ($month != 0) {
            if ($this->session->has_userdata('admin_find'))
                $this->session->set_userdata('admin_find', null);
        }
        $paginate_url = '/web/manage/mmember/point/' . $month;
        $data['action_url'] = $paginate_url;
        $data['month'] = $month;

        //▽ Search DB ───────────────────────────────────
        $data['userList'] = $this->mmember_model->get_point_list($start_page, $limit_page);
        $total_rows = $this->mmember_model->get_point_rowcount();

        //▽ Pagination & View ───────────────────────────────────
        $data['pagination'] = $this->_pagination_init($paginate_url, $total_rows, $limit_page);
        $this->load->view('manage/user/member_point', $data);
    }

}
