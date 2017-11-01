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

class Shop extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
		$this->load->model('web/shop_model');
    }      
            
    public function home($provider_id = null, $return_sep = null)
    {
        $this->load->helper('url'); 

        $data['providerOne'] = $this->shop_model->get_provider_one($provider_id);
        if (empty($provider_id) || empty($data['providerOne']))
            show_404();

        if ($data['providerOne']->state != 'O')
            redirect(base_url('web/user/shopfind/search'));
        
        $data['pofolList'] = $this->shop_model->get_portfolio_list($provider_id);    //포트폴리오 전체
        $data['productTopx'] = $this->shop_model->get_product_listx($provider_id);    //업체상품 9개
        $data['return_sep'] = $return_sep;
        $this->shop_model->set_readcount_increase($provider_id);        

        $apjuso = explode(' ', $data['providerOne']->addressjibun);
        $juso = $apjuso[0] . ' ' . $apjuso[1];
        $this->_recentlist_setcookie($provider_id, $data['providerOne']->corpname, $data['providerOne']->bizcategory, $juso);
        
        $this->load->view('shop/provider_home', $data);
    }
    
    public function product($provider_idx = null, $talk_kind = 'all', $srh_mode = 'no', $start_page = null)
    {
        if (empty($provider_idx))
            show_404();
        
        $this->load->helper('my_definition');
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');                 

        $limit_page = 12;
        
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;
        
        $talk_code_arr = define_talk_code();
        if ($talk_kind != 'all') {
            foreach($talk_code_arr as $key => $value) {
                if ($key == $talk_kind)
                    $data['talkind_btn'][$value] = 'btn-u btn-sm rounded-3x btn-u-brown';
                else 
                    $data['talkind_btn'][$value] = 'btn-u btn-u-xs btn-brd btn-brd-hover rounded-3x btn-u-brown text-bold';
            }
        } else {
            foreach($talk_code_arr as $key => $value)  
                $data['talkind_btn'][$value] = 'btn-u btn-u-xs btn-brd btn-brd-hover rounded-3x btn-u-brown text-bold';
        }           
                     
        if ($srh_mode == 'no') {
            $this->session->set_userdata('search_keword', null);
            $this->session->set_userdata('search_field', null);
        }
         
        if ($this->input->post('search_keword')) {    
            $this->session->set_userdata('search_keword', $this->input->post('search_keword'));
            $this->session->set_userdata('search_field', $this->input->post('search_field'));
            redirect(base_url('web/user/shop/product/' . $provider_idx . '/' . $talk_kind . '/srh'));
            
        } 
        else {
            $paginate_url = '/web/user/shop/product/' . $provider_idx . '/' . $talk_kind . '/' . $srh_mode;
        }
             
        if ($srh_mode == 'srh') {   
            $data['productList'] = $this->shop_model->get_shopproduct_search($start_page, $limit_page, $provider_idx, $talk_kind);
            $total_rows = $this->shop_model->get_shopproductsearch_rowcount($provider_idx, $talk_kind);
            $data['numbering'] = $total_rows - $start_page;
        } 
        else {
            $data['productList'] = $this->shop_model->get_shopproduct_list($start_page, $limit_page, $provider_idx, $talk_kind);
            $total_rows = $this->shop_model->get_shopproduct_rowcount($provider_idx, $talk_kind);
            $data['numbering'] = $total_rows - $start_page;
        }
        
        if (empty($data['productList']))
            $data['nickn_title'] = '등록된 상품이 없습니다';
        else            
            $data['nickn_title'] = $data['productList'][0]->nickname . '님의 등록 상품입니다.';
                             
        $config['base_url'] = $paginate_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 7;
                
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
        
        $this->load->view('shop/provider_product', $data);
    }

    public function goods($member_idx = null, $talk_kind = 'all', $srh_mode = 'no', $start_page = null)
    {
        if (empty($member_idx))
            show_404();
        
        $this->load->helper('my_definition');
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');                 

        $limit_page = 12;
        
        if (empty($start_page))
            $start_page = 0;
        else
            $start_page = ($start_page - 1) * $limit_page;
        
        $talk_code_arr = define_talk_code();
        if ($talk_kind != 'all') {
            foreach($talk_code_arr as $key => $value) {
                if ($key == $talk_kind)
                    $data['talkind_btn'][$value] = 'btn-u btn-sm rounded-3x btn-u-brown';
                else 
                    $data['talkind_btn'][$value] = 'btn-u btn-u-xs btn-brd btn-brd-hover rounded-3x btn-u-brown text-bold';
            }
        } else {
            foreach($talk_code_arr as $key => $value)  
                $data['talkind_btn'][$value] = 'btn-u btn-u-xs btn-brd btn-brd-hover rounded-3x btn-u-brown text-bold';
        }           
                     
        if ($srh_mode == 'no') {
            $this->session->set_userdata('search_keword', null);
            $this->session->set_userdata('search_field', null);
        }
         
        if ($this->input->post('search_keword')) {    
            $this->session->set_userdata('search_keword', $this->input->post('search_keword'));
            $this->session->set_userdata('search_field', $this->input->post('search_field'));
            redirect(base_url('web/user/shop/goods/' . $member_idx . '/' . $talk_kind . '/srh'));            
        } 
        else {
            $paginate_url = '/web/user/shop/goods/' . $member_idx . '/' . $talk_kind . '/' . $srh_mode;
        }
             
        if ($srh_mode == 'srh') {
            $data['numbering'] = $total_rows - $start_page;
        } 
        else {
            $data['productList'] = $this->shop_model->get_shopgoods_list($start_page, $limit_page, $member_idx, $talk_kind);
            $total_rows = $this->shop_model->get_shopgoods_rowcount($member_idx, $talk_kind);
            $data['numbering'] = $total_rows - $start_page;
        }       

        if (empty($data['productList']))
            $data['nickn_title'] = '등록된 상품이 없습니다';
        else            
            $data['nickn_title'] = $data['productList'][0]->nickname . '님의 등록 상품입니다.';
                 
        $config['base_url'] = $paginate_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $limit_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 7;                
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
        
        $this->load->view('shop/member_goods', $data);
    }                     
    
    public function updateportfolio()
    {
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ( ! $this->session->has_userdata('user_id'))
            show_404();
        
        if ($this->session->userdata('group_mkind') != '기업회원')
            redirect(base_url('web'));
                               
		$data['portfolioList'] = $this->shop_model->get_portfolio_list($this->session->userdata('user_id'));						
        
        $this->form_validation->set_rules('start_date', '시작일', 'required|regex_match[/(\d{4})-(\d{2})-(\d{2})/]');
        $this->form_validation->set_rules('finish_date', '종료일', 'required|regex_match[/(\d{4})-(\d{2})-(\d{2})/]');
        $this->form_validation->set_rules('introduce', '설명', 'trim|required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('shop/portfolio_update', $data);
        } 
        else {
	
        	$uploaded_file = $this->_upload_portfolio();
			if (empty($uploaded_file)) {
                $this->session->set_userdata('error_msg', '포트폴리오 이미지 첨부는 필수입니다.');
                $this->session->mark_as_flash('error_msg');
                redirect(base_url('web/user/shop/updateportfolio'));
			}
            
            $affected_rowcnt = $this->shop_model->set_portfolio($uploaded_file);
            if ($affected_rowcnt == 1)              
                redirect(base_url('web/user/shop/updateportfolio'));
            else
                show_404();
        }         
    }

    public function deleteportfolio($portfolio_idx = null)
    {
        $this->load->helper('url');

        if ( ! $this->session->has_userdata('user_id'))
            show_404();
        
        if ($this->session->userdata('group_mkind') != '기업회원')
            show_404();
        
        $affected_rowcnt = $this->shop_model->del_portfolio($portfolio_idx);
        if ($affected_rowcnt == 1)
            redirect(base_url('web/user/shop/updateportfolio'));
        else
            show_404();
    }
    
    private function _recentlist_setcookie($idx, $corp_name, $biz_kind, $address)
    {                               
        $article = array();
        
        if ($this->input->cookie('recent_shop')) {

            $recent_talks = unserialize($this->input->cookie('recent_shop'));
            $this_articlecode = 'shop_' . $idx;        
            $article['code'] = $this_articlecode;
            $article['title'] = $corp_name;
            $article['link'] = '/web/user/shop/home/' . $idx;
            $article['info'] = $biz_kind . ' | ' . $address;
            $bypass = TRUE;
      
            for ($i = 0; $i < count($recent_talks); $i++) {
                if ($recent_talks[$i]['code'] == $this_articlecode) {                     
                    $bypass = FALSE;
                } 
            }                                  
            
            if ($bypass) {                
                array_unshift($recent_talks, $article);
                $recent_talkscut = array_slice($recent_talks, 0, 3);               
                $final = serialize($recent_talkscut);
                $cookie = array(
                        'name'   => 'recent_shop',
                        'value'  => $final,
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
            $article[0]['code'] = 'shop_' . $idx;
            $article[0]['title'] = $corp_name;
            $article[0]['link'] = '/web/user/shop/home/' . $idx;
            $article[0]['info'] = $biz_kind . ' | ' . $address;
            
            $final = serialize($article);
            $cookie = array(
                    'name'   => 'recent_shop',
                    'value'  => $final,
                    'expire' => '0',
                    'domain' => '.furnipeople.com',
                    'path'   => '/',
                    'prefix' => '',
                    'secure' => FALSE
            );
            $this->input->set_cookie($cookie);
        }                                  
    }    
	
	private function _upload_portfolio()
	{
        require_once('third_external/VerotUpload.php');
        
        $image_folder = '/home/hosting_users/furnipeopleweb/www/static/portfolio/' . date('Ym');
        $thumb_folder = '/home/hosting_users/furnipeopleweb/www/static/portfolio/' . date('Ym') . '/thumb';
		 
		$handle = new Upload($_FILES['portfol_photo']);
		$uploadedFile = array();
			
		if ($handle->uploaded) 
		{				
			$handle->allowed = array('image/*');
			$handle->file_new_name_body = md5(uniqid(rand(), true));
			
			if ($handle->image_src_x > $handle->image_src_y) { 
                        if ($handle->image_src_x > 1024) {
                            $handle->image_resize = true;
                            $handle->image_x = 1024;
                            $handle->image_ratio_y = true;
                        }                       
                    } 
                    else {
                        if ($handle->image_src_y > 800) {
                            $handle->image_resize = true;
                            $handle->image_y = 800;    
                            $handle->image_ratio_x = true;
                        }                       
                    } 				    			        
		                                                
			$handle->Process($image_folder);                    
			if ($handle->processed) 
			{
				$uploadedFile['imageunqname'] = $handle->file_dst_name;
				$uploadedFile['imagesize'] = round(filesize($handle->file_dst_pathname)/256)/4;
				$uploadedFile['imagewidth'] = $handle->image_dst_x;
				$uploadedFile['imageheight'] = $handle->image_dst_y;
				$uploadedFile['devidefolder'] = date('Ym');
			} 
			else {
				echo '최종 저장 폴더에 템포러리로 부터 카피된 파일이 없습니다.<br>';
				echo 'Error: ' . $handle->error . '<br>';
			}
			                                     
                    $handle->file_new_name_body = 'tb_' . $handle->file_dst_name_body;
                    $handle->image_resize = true;
                    $handle->image_x = 400;
                    $handle->image_ratio_y = true;
                    
                    $handle->Process($thumb_folder);                    
                    if ($handle->processed) 
                    {                        
                        $uploadedFile['thumunqname'] = $handle->file_dst_name;
                        $uploadedFile['thumsize'] = round(filesize($handle->file_dst_pathname)/256)/4;
                        $uploadedFile['thumwidth'] = $handle->image_dst_x;
                        $uploadedFile['thumheight'] = $handle->image_dst_y;                                                                                                                                                                     
                    } 
                    else {
                        echo '최종 저장 폴더에 템포러리로 부터 카피된 파일이 없습니다. 2<br>';
                        echo 'Error: ' . $handle->error . '<br>';
                    }
					 					        
			$handle-> Clean();
		} 	
		
		return $uploadedFile;
	}	
    
}