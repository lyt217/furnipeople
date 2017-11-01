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
 
class Notice extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('my_definition');
		$this->load->model('share/notice_model');
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
					 
		if ($srh_mode == 'no') {
			$this->session->set_userdata('search_keword', null);
			$this->session->set_userdata('search_field', null);
		}
		 
		if ($this->input->post('search_keword')) {    
			$this->session->set_userdata('search_keword', $this->input->post('search_keword'));
			$this->session->set_userdata('search_field', $this->input->post('search_field'));
			redirect($this->config->item('base_url') . 'web/service/notice/search/' . $talk_kind . '/srh');
		} 
		else {
			$paginate_url = '/web/service/notice/search/' . $talk_kind . '/' . $srh_mode;
		}
				
        $data['articleList'] = $this->notice_model->get_article_list($start_page, $limit_page, $srh_mode);
		$total_rows = $this->notice_model->get_article_rowcount($srh_mode);
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
		
		$this->load->view('service/notice_search', $data);
	}

	public function article($idx = null, $return_sep = null)
	{
		$this->load->helper('url');	
				
		$data['articleOne'] = $this->notice_model->get_article_one($idx);
		if (empty($idx) || empty($data['articleOne']))
			show_404();
		
		if ($data['articleOne']->state != 'O')
			redirect(base_url('web/service/notice/search/all/no'));
		 
		$this->notice_model->set_readcount_increase($idx);

    	if ($return_sep == 'rtnlist')
			$data['return_jscript'] = 'javascript:window.location.href=\'/web/service/notice/search/all/no\';';
		else
    		$data['return_jscript'] = 'javascript:history.back();return false;';
		
		$this->load->view('service/notice_oneview', $data);
	}
    
    public function create()
    {
        if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹')
            $bulk = null;
        else            
            show_404();      
        		
		$data['submit_action'] = 'create';
    	$data['return_jscript'] = 'javascript:history.back();return false;';
        $data['mentyn_radio']['Y'] = TRUE;
        $data['delete_btn'] = FALSE;
		 							
		$this->load->helper(array('form', 'url'));		
	    $this->load->library('form_validation');
		
		$this->form_validation->set_rules('talk_title', '제목', 'trim|required');
		
	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('service/notice_create', $data);
	    } 
	    else {
			$affected_rowcnt = $this->notice_model->set_article();
			if ($affected_rowcnt == 1)				
                redirect(base_url('web/service/notice/search/all/no'));
			else
				show_404();
	    }
    }
	
    public function update($idx = null, $mode = null)
    {
    	$this->load->helper('url');
						
        if ($this->session->userdata('group_mkind') == '운영그룹' || $this->session->userdata('group_mkind') == '관리그룹')
            $bulk = null;
        else            
            show_404();
                        
		$data['articleOne'] = $this->notice_model->get_article_one($idx);
		if (empty($idx) || empty($data['articleOne']))
			show_404();
        
        if ($mode == 'delete')
            $this->_delete_proc($idx);
		 
		$data['submit_action'] = 'update/' . $idx;
		$data['mentyn_radio'][$data['articleOne']->mentyn] = TRUE;
		$data['return_jscript'] = 'javascript:history.back();return false;';
        $data['delete_btn'] = TRUE;
		 							
		$this->load->helper('form');
	    $this->load->library('form_validation');
		
		$this->form_validation->set_rules('talk_title', '제목', 'trim|required');	
		
	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('service/notice_create', $data);
	    } 
	    else {
			$affected_rowcnt = $this->notice_model->set_article_update($idx);
			if ($affected_rowcnt == 1)				
                redirect(base_url('web/service/notice/article/'.$idx.'/rtnlist'));
			else
				show_404();
	    }
    }

    private function _delete_proc($idx)
    {
        $affected_rowcnt = $this->notice_model->set_article_delete($idx);
        if ($affected_rowcnt == 1)            
            redirect(base_url('web/service/notice/search/all/no'));
        else
            show_404();
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