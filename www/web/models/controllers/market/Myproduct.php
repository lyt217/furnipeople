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

class Myproduct extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('my_definition');
        $this->load->model('web/myproduct_model');
        $this->load->model('web/home_model');
    		$this->load->model('web/kindcode_model');
    }

    public function index($bulk = 'all', $srh_mode = 'no', $start_page = null)
    {
        $this->load->helper('url');
        if ( ! $this->session->has_userdata('user_id'))
            redirect(base_url('web/user/membership'));
        $this->load->library('pagination');

        //Furni Best
    		$data['talkbestTopx'] = $this->home_model->get_talkbestx();
        //▽ Notice ───────────────────────────────────
    		$data['noticeTopx'] = $this->home_model->get_noticex();
        //가구 종류 data
    		$data['kindcode'] = $this->kindcode_model->get_kind_list();

        $limit_page = 10;

        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        $paginate_url = '/web/market/myproduct/index/all/no';

        $data['productList'] = $this->myproduct_model->get_myproduct_list($start_page, $limit_page);
        $total_rows = $this->myproduct_model->get_myproduct_rowcount();

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

        $this->load->view('mymy/my_product', $data);
    }

    public function favoritedelete($zzim_idx = null)
    {
        if ( ! $this->input->is_ajax_request())
            exit();

        if ($this->input->method(TRUE) != 'DELETE')
            exit();

        if (empty($zzim_idx))
            exit();

        $affected_rowcnt = $this->myproduct_model->del_myzzim($zzim_idx);
        if ($affected_rowcnt == 1)
            echo 'success';
    }

    public function favoriteadd()
    {
        if ( ! $this->input->is_ajax_request())
            exit();

        //▽ Validation ───────────────────────────────────
        if ( ! $this->session->has_userdata('user_id')) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '회원 서비스입니다.';
        }
        else if ($this->input->post('product_idx') == 0) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = 'product ID does not exist';
        }
        else if ($this->session->userdata('user_id') == $this->input->post('prod_owneridx') && $this->session->userdata('group_table') == $this->input->post('prod_ownerkind')) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '본인제품은 관심등록이 안됩니다.';
        }
        else if ($this->myproduct_model->has_myzzim_being()) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '이미 관심등록이 되어있습니다.';
        }
        else {
            $productOne = $this->myproduct_model->get_product_one($this->input->post('product_idx'));
            if ($productOne) {
                $affected_rowcnt = $this->myproduct_model->set_product_copy($productOne);
                if ($affected_rowcnt == 1) {
                    $return_result['state'] = 'ok';
                    $return_result['zzimcnt'] = $productOne->interestcnt + 1;
                    $return_result['msg'] = '관심가구로 등록되었습니다.';
                } else {
                    $return_result['state'] = 'fail';
                    $return_result['msg'] = 'zzim error';
                }
            }
        }

        header('Content-Type:text/json');
        echo json_encode($return_result);
    }

    public function favoriteitem($zzim_idx = null, $product_idx = null, $return_sep = null)
    {
        if ( ! $this->session->has_userdata('user_id'))
            show_404();

        if (empty($zzim_idx) || empty($product_idx))
            show_404();

        $this->load->helper('url');
        if (empty($return_sep))
            $product_url = 'web/market/product/detail/' . $product_idx;
        else
            $product_url = 'web/market/product/detail/' . $product_idx . '/' . $return_sep;

        $productOne = $this->myproduct_model->get_product_one($product_idx);
        if (empty($productOne)) {
                $this->myproduct_model->del_myzzim($zzim_idx);
                echo '<script type="text/javascript">alert("존재하지 않거나 삭제한 제품입니다.");</script>';
                echo '<script type="text/javascript">history.back();</script>';
        }
        else {
            $affected_rowcnt = $this->myproduct_model->set_product_copyupdate($productOne, $zzim_idx);
            if ($affected_rowcnt == 1)
                redirect(base_url($product_url));
            else
                redirect(base_url($product_url));
        }

    }

    public function favoritelist($bulk = 'all', $srh_mode = 'no', $start_page = null)
    {
        $this->load->helper('url');
        if ( ! $this->session->has_userdata('user_id'))
            redirect(base_url('web/user/membership'));
        $this->load->library('pagination');


        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();
        //▽ Notice ───────────────────────────────────
        $data['noticeTopx'] = $this->home_model->get_noticex();
        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();

        $limit_page = 10;

        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        $paginate_url = '/web/market/myproduct/favoritelist/all/no';

        $data['zzimList'] = $this->myproduct_model->get_myzzim_list($start_page, $limit_page);
        $total_rows = $this->myproduct_model->get_myzzim_rowcount();

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

        $this->load->view('mymy/my_favorite_product', $data);
    }

}
