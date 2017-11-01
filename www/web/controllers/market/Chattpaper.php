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

class Chattpaper extends CI_Controller
{
    private $receiver_nick = null;
    private $receiver_code = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('my_definition');
        $this->load->model('web/chattpaper_model');
        $this->load->model('web/home_model');
    		$this->load->model('web/kindcode_model');
    		$this->load->helper(array('form', 'url'));
    }

    public function mychatt($partner_code = 'no', $srh_mode = 'no', $start_page = null)
    {
        $this->load->helper('url');
        if ( ! $this->session->has_userdata('user_id'))
            redirect(base_url('web/user/membership'));
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->helper('my_definition');

        //Furni Best
    		$data['talkbestTopx'] = $this->home_model->get_talkbestx();
        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();

        $limit_page = 20;

        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;

        if ($this->session->userdata('msgalert_box') > 0) {
            $this->chattpaper_model->set_alertflag_zero();
            $this->session->set_userdata('msgalert_box', 0);
        }

        $paginate_url = '/web/market/chattpaper/mychatt/' . $partner_code . '/no';
        $data['partner_code'] = $partner_code;

        $data['chattList'] = $this->chattpaper_model->get_chatt_list($start_page, $limit_page, $partner_code);
        $total_rows = $this->chattpaper_model->get_chatt_rowcount($partner_code);

        //▽ Pagination ───────────────────────────────────
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

        $this->load->view('market/chattpaper_search', $data);
    }

    public function send($jisup = null)
    {
        if ( ! $this->input->is_ajax_request())
            exit();

        //▽ Validation ───────────────────────────────────
        if ( ! $this->session->has_userdata('user_id')) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '회원 서비스입니다.';
        }
        else if (trim($this->input->post('message')) == '') {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '쪽지 메시지를 작성하세요';
        }
        else if ($this->session->userdata('user_id') == $this->input->post('receiver_idx') && $this->session->userdata('group_table') == $this->input->post('receiver_kind')) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '본인에게는 쪽지발송이 안됩니다.';
        }
        else if ( ! $receiver_nick = $this->_receiver_isalive()) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '탈퇴한 회원입니다.';
        }
        else {
            $affected_rowcnt = $this->chattpaper_model->set_chattmessage($this->receiver_nick, $this->receiver_code);
            if ($jisup == 'jisup')
                $this->chattpaper_model->set_product_chattjisu();

            if ($affected_rowcnt == 1) {
                $return_result['state'] = 'ok';
                $return_result['msg'] = '쪽지 메시지가 발송되었습니다.';
            } else {
                $return_result['state'] = 'fail';
                $return_result['msg'] = 'send error';
            }
        }

        header('Content-Type:text/json');
        echo json_encode($return_result);
    }

    /**
     * 존재하는 회원 (미탈퇴 회원) 이면, 최신 닉네임, 이메일을 가져온다.
     */
    private function _receiver_isalive()
    {
        $row = $this->chattpaper_model->has_article_auth($this->input->post('receiver_idx'), $this->input->post('receiver_kind'));
        if ($row) {
            $this->receiver_nick = $row['nickname'];
            $this->receiver_code = $row['usrcode'];
            return $row['nickname'];
        }
        else {
            return FALSE;
        }
    }

}
