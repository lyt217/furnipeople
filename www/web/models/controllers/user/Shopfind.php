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

class Shopfind extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    		$this->load->model('web/kindcode_model');
        $this->load->model('web/findshop_model');
        $this->load->model('web/home_model');
    }

    public function search($biz_kind = 'all', $srh_mode = 'no')
    {
        $this->load->helper('form');
        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();
        //가구 종류 data
    		$data['kindcode'] = $this->kindcode_model->get_kind_list();

        if ($this->input->method(TRUE) == 'POST') {
            $data['srh_mode'] = 'srh';
            $this->session->set_userdata('find_shop_post', $this->input->post());
        }
        else {
            $data['srh_mode'] = 'no';
            if ($this->session->has_userdata('find_shop_post'))
                $this->session->set_userdata('find_shop_post', null);
        }

        $data['biz_kind'] = $biz_kind;
        $this->load->view('shop/geoshop_search', $data);
    }

    public function searchajax($biz_kind = 'all', $srh_mode = 'no', $start_page = null)
    {
        if ( ! $this->input->is_ajax_request())
            exit();

        $this->load->library('pagination');

        $limit_page = 10;

        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        if ($srh_mode != 'srh') {
            $this->session->set_userdata('find_shop_post', null);
        }

        $paginate_url = '/web/user/shopfind/searchajax/' . $biz_kind . '/' . $srh_mode;

        if ($srh_mode == 'srh') {
            $data['shopList'] = $this->findshop_model->get_shop_find($start_page, $limit_page);
            $total_rows = $this->findshop_model->get_shopfind_rowcount();
            $data['numbering'] = $total_rows - $start_page;
        } else {
            $data['shopList'] = $this->findshop_model->get_shop_list($start_page, $limit_page, $biz_kind);
            $total_rows = $this->findshop_model->get_shop_rowcount($biz_kind);
            $data['numbering'] = $total_rows - $start_page;
        }

        $numbering = $total_rows - $start_page;

        $shop_jsdata = null;
        if ($data['shopList']) {
            foreach ($data['shopList'] as $shop):
                $shop_jsdata .= "['" . $shop->corpname . "', " . $shop->latitude . ", " . $shop->longitude . ", " . $numbering-- . "," .$shop->id ."], ";
            endforeach;
            $data['shop_jsdata'] = substr($shop_jsdata, 0, -2);

            $data['my_latitude'] = $data['shopList'][0]->latitude;
            $data['my_longitude'] = $data['shopList'][0]->longitude;
        }
        else {
            $data['shop_jsdata'] = '';
            $data['my_latitude'] = '37.50302654925896';
            $data['my_longitude'] = '127.05778660282249';
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

        $this->load->view('shop/geoshop_ajax', $data);
    }

}
