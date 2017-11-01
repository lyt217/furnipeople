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

class Photo extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('my_definition');
		$this->load->model('web/talkphoto_model');
	}    
	     
    public function search($talk_kind = 'all', $srh_mode = 'no', $start_page = null)
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');					

		$limit_page = 20;
		
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
			redirect($this->config->item('base_url') . 'web/talk/photo/search/' . $talk_kind . '/srh');
		} 
		else {
			$paginate_url = '/web/talk/photo/search/' . $talk_kind . '/' . $srh_mode;
		}
				
		if ($srh_mode == 'srh') {	
			$data['articleList'] = $this->talkphoto_model->get_article_search($start_page, $limit_page, $talk_kind);
			$total_rows = $this->talkphoto_model->get_articlesearch_rowcount($talk_kind);
			$data['numbering'] = $total_rows - $start_page;
		} 
		else {
			$data['articleList'] = $this->talkphoto_model->get_article_list($start_page, $limit_page, $talk_kind);
			$total_rows = $this->talkphoto_model->get_article_rowcount($talk_kind);
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
		
		$this->load->view('talk/photo_search', $data);
	}

	public function article($idx = null, $return_sep = null)
	{
		$this->load->helper('url');	
				
		$data['articleOne'] = $this->talkphoto_model->get_article_one($idx);
		if (empty($idx) || empty($data['articleOne']))
			show_404();
		
		if ($data['articleOne']->state != 'O')
			redirect($this->config->item('base_url') . 'web/talk/photo/search/all/no');
		 
		$this->talkphoto_model->set_readcount_increase($idx);
		$this->_recentlist_setcookie($idx, $data['articleOne']->title);
				
    	if ($return_sep == 'rtnlist')
			$data['return_jscript'] = 'javascript:window.location.href=\'/web/talk/photo/search/all/no\';';
		else
    		$data['return_jscript'] = 'javascript:history.back();return false;';
		
		$this->load->view('talk/photo_oneview', $data);
	}
    
    public function create()
    {		
		$data['submit_action'] = 'create';
    	$data['kind_select']['a'] = TRUE;
    	$data['mentyn_radio']['Y'] = TRUE;
    	$data['return_jscript'] = 'javascript:history.back();return false;';
        $data['delete_btn'] = FALSE;		
		 							
		$this->load->helper(array('form', 'url'));		
	    $this->load->library('form_validation');
		
		$this->form_validation->set_rules('talk_title', '제목', 'trim|required');
		if ( ! $this->session->has_userdata('user_id')) { 
			$this->form_validation->set_rules('guest_writer', '작성자명', 'trim|required');
			$this->form_validation->set_rules('guest_passwd', '비밀번호', 'trim|required');
			$this->form_validation->set_rules('guest_email', '이메일주소', 'trim|required|valid_email');
		}
		
	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('talk/photo_create', $data);
	    } 
	    else {
	    	if ( ! $this->session->has_userdata('user_id')) {	    	
				if (empty($this->input->post('g-recaptcha-response')))
					show_404();
			}

			$affected_rowcnt = $this->talkphoto_model->set_article($this->session->userdata('user_id'));
			if ($affected_rowcnt == 1) {
			    $this->_mypoint_adjust('inc');
				redirect($this->config->item('base_url').'web/talk/photo/search/all/no');
			} else {
				show_404();
            }
	    }
    }

    public function update($idx = null, $mode = null)
    {
    	$this->load->helper('url');
						
		$data['articleOne'] = $this->talkphoto_model->get_article_one($idx);
		if (empty($idx) || empty($data['articleOne']))
			show_404();
		    	
    	if ($this->session->has_userdata('user_id')) {
    		if ($data['articleOne']->userdbtable != $this->session->userdata('group_table') || $data['articleOne']->user_id != $this->session->userdata('user_id'))
				redirect($this->config->item('base_url').'web/talk/photo/article/'.$idx);
		} 
		else {
    		if ($data['articleOne']->user_id > 0)
				redirect($this->config->item('base_url').'web/talk/photo/article/'.$idx);
		}
        
        if ($mode == 'delete')
            $this->_delete_proc($idx, $data['articleOne']->kindcode);
		 
		$data['submit_action'] = 'update/' . $idx;		
		$data['kind_select'][$data['articleOne']->kindcode] = TRUE;
		$data['mentyn_radio'][$data['articleOne']->mentyn] = TRUE;
		$data['return_jscript'] = 'javascript:history.back();return false;';
        $data['delete_btn'] = TRUE;					
		 							
		$this->load->helper('form');
	    $this->load->library('form_validation');
		
		$this->form_validation->set_rules('talk_title', '제목', 'trim|required');
		if ( ! $this->session->has_userdata('user_id')) { 
			$this->form_validation->set_rules('guest_writer', '작성자명', 'trim|required');
			$this->form_validation->set_rules('guest_passwd', '비밀번호', 'trim|required');
			$this->form_validation->set_rules('guest_email', '이메일주소', 'trim|required|valid_email');
		}		
		
	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('talk/photo_create', $data);
	    } 
	    else {
	    	if ( ! $this->session->has_userdata('user_id')) {	    	
				if (empty($this->input->post('g-recaptcha-response')))
					show_404();
				$this->_nonmember_auth($idx);
			}
			
			$affected_rowcnt = $this->talkphoto_model->set_article_update($idx, $this->session->userdata('user_id'), $data['articleOne']->kindcode);
			if ($affected_rowcnt == 1)
				redirect($this->config->item('base_url').'web/talk/photo/article/'.$idx.'/rtnlist');
			else
				show_404();
	    }
    }

    public function recomm($idx = null)
    {
        if ( ! $this->input->is_ajax_request())
            exit();

        if ($this->input->method(TRUE) != 'UPDATE')
            exit();
                       
        $articleOne = $this->talkphoto_model->get_article_one($idx);                       
        
        if ( ! $this->session->has_userdata('user_id')) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '회원 서비스입니다.';
        }
        else if (empty($idx) || empty($articleOne)) {                
            $return_result['state'] = 'fail';
            $return_result['msg'] = 'Article does not exist';
        }
        else if ($articleOne->user_id == $this->session->userdata('user_id') && $articleOne->userdbtable == $this->session->userdata('group_table')) {
            $return_result['state'] = 'fail';
            $return_result['msg'] = '본인 글은 추천불가 입니다.';
        }
        else if ($this->talkphoto_model->has_recomm_being($idx)) {
            $return_result['state'] = 'fail';            
            $return_result['msg'] = '이미 추천 하셨습니다.';
        }        
        else {            
            $affected_rowcnt = $this->talkphoto_model->set_recomm($idx);
            if ($affected_rowcnt == 1) {
                $return_result['state'] = 'ok';
                $return_result['recomcnt'] = $articleOne->onechucnt + 1;
                $return_result['msg'] = '추천되었습니다.';
            } else {
                $return_result['state'] = 'fail';
                $return_result['msg'] = 'recommend error';
            }                                                                   
        }

        header('Content-Type:text/json');
        echo json_encode($return_result);
    }

	private function _nonmember_auth($idx)
	{		
		$articleOne = $this->talkphoto_model->has_article_auth($idx, $this->input->post('guest_email'), $this->input->post('guest_passwd'));
		if (empty($articleOne)) {				
			$this->session->set_userdata('deny_msg', '이 비회원 글에 대한 비밀번호 또는 이메일이 일치하지 않습니다!');
			$this->session->mark_as_flash('deny_msg');
			redirect($this->config->item('base_url').'web/talk/photo/update/'.$idx, 'location', 302);
		}
	}

    private function _delete_proc($idx, $old_kindcode)
    {
        if ($this->session->has_userdata('user_id')) {            
            $affected_rowcnt = $this->talkphoto_model->set_article_delete($idx, $this->session->userdata('user_id'), $old_kindcode);
        }
        else {
            $this->_nonmember_auth($idx);
            $affected_rowcnt = $this->talkphoto_model->set_article_delete($idx, 0, $old_kindcode);
        }             
        
        if ($affected_rowcnt == 1) {
            $this->_mypoint_adjust('dec');
            redirect($this->config->item('base_url').'web/talk/photo/search/all/no');
        } else {
            show_404();
        }
    }

    private function _recentlist_setcookie($idx, $title)
    {                           
        $article = array();
        
        if ($this->input->cookie('recent_talks')) {

            $recent_talks = unserialize($this->input->cookie('recent_talks'));
            $this_articlecode = $this->router->fetch_class() . '_' . $idx;
            $article['code'] = $this_articlecode;
            $article['title'] = title_utfcut3($title);
            $article['link'] = '/web/talk/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/' . $idx . '/rtnlist';
            $bypass = TRUE;
      
            for ($i = 0; $i < count($recent_talks); $i++) {
                if ($recent_talks[$i]['code'] == $this_articlecode) {                     
                    $bypass = FALSE;
                } 
            }                                  
            
            if ($bypass) {                
                array_unshift($recent_talks, $article);
                $recent_talkscut = array_slice($recent_talks, 0, 5);
                $final = serialize($recent_talkscut);
                $cookie = array(
                        'name'   => 'recent_talks',
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
            $article[0]['code'] = $this->router->fetch_class() . '_' . $idx;
            $article[0]['title'] = title_utfcut3($title);
            $article[0]['link'] = '/web/talk/' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . '/' . $idx . '/rtnlist';
            
            $final = serialize($article);
            $cookie = array(
                    'name'   => 'recent_talks',
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

    private function _mypoint_adjust($adjust)
    {        
        if ( ! $this->session->has_userdata('user_id'))
            return;        

        $this->talkphoto_model->set_mypoint($adjust);
    } 
	
	public function ajax_upload_photo()
	{
		require_once('third_external/VerotUpload.php');		
		$image_folder = '/home/hosting_users/furnipeopleweb/www/static/talkphoto/' . date('Ym');
		 		
		if (isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH'])) {
        	$handle = new Upload('php:'.$_SERVER['HTTP_X_FILE_NAME']);		
		} 
		else {
        	$handle = new Upload($_FILES['ajax_upload']);
		}			
						
		$return_filename = null;
			
		if ($handle->uploaded) 
		{
			$handle->allowed = array('image/*');
			$handle->file_new_name_body = md5(uniqid(rand(), true));
						
			if ($handle->image_src_x > $handle->image_src_y) { 
				if ($handle->image_src_x > 740) {
					$handle->image_resize = true;
					$handle->image_x = 740;
					$handle->image_ratio_y = true;
				} 						
			} 
			else {
				if ($handle->image_src_y > 540) {
					$handle->image_resize = true;
					$handle->image_y = 540;    
					$handle->image_ratio_x = true;						
				} 						
			}											    			        
		                                                
			$handle->Process($image_folder);                    
			if ($handle->processed) {
				$return_filename = $handle->file_dst_name;
			} 
			else {
				echo '최종 저장 폴더에 템포러리로 부터 카피된 파일이 없습니다.<br>';
				echo 'Error: ' . $handle->error . '<br>';
			}		        
			$handle-> Clean();
		} 

		echo date('Ym') . '/' . $return_filename;						
	}	 	    

}