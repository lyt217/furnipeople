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

class Portfolio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('my_definition');
        $this->load->model('web/myproduct_model');
        $this->load->model('web/home_model');
    		$this->load->model('web/kindcode_model');
        $this->load->model('web/shop_model');
    		$this->load->helper(array('form', 'url'));
    }

    public function detail($idx = null)
    {
        $this->load->helper('url');

        $data['portfolioOne'] = $this->shop_model->get_portfolio_one($idx);
        for($i = 0 ; $i < sizeof($data['portfolioOne']) ; $i++){
        // foreach($data['pofolList'] as $portfo){
          $data['portfolioOne'][$i]['photolist'] = $this->shop_model->get_portfolio_photo($data['portfolioOne'][$i]['id']);
          // echo $portfo['id'];
        }
        if (empty($idx) || empty($data['portfolioOne']))
            show_404();

        $this->load->view('shop/portfolio_oneview', $data);
    }
}
