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

class Comment2 extends CI_Controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('web/comment2_model');
    }
    
	public function search($talkboard_table = null, $sorting = 'asc', $start_page = null)
	{
        if ( ! $this->input->is_ajax_request())
            exit();	    
        	            
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');					

		$limit_page = 20;
		
		if (empty($start_page))
			$start_page = 0;
		else
			$start_page = ($start_page - 1) * $limit_page;			
		
        if (empty($talkboard_table) || empty($this->input->post('total_rows')) || empty($this->input->post('talkidx')))
            show_404();
				
		$paginate_url = '/web/talk/comment/search/' . $talkboard_table . '/' . $sorting;
				
		$data['mentList'] = $this->talkment_model->get_ment_list($start_page, $limit_page, $talkboard_table, $this->input->post('talkidx'));
		if ($this->input->post('total_rows') == 'none')
            $total_rows = $this->talkment_model->get_ment_rowcount($talkboard_table, $this->input->post('talkidx'));
        else
            $total_rows = $this->input->post('total_rows');                					
					
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
		
		if ($this->session->has_userdata('user_id'))
			$this->load->view('talk/comment_member', $data);
		else
			$this->load->view('talk/comment_guest', $data);
	}    
    
    public function create($talkboard_name = null)
    {    	
    	if ( ! $this->input->is_ajax_request())
			exit();
		        
        $talkboard_id = $this->input->post('talk_idx');
        if (empty($talkboard_name) || empty($talkboard_id)) {
            $return_result['state'] = 'paramfail';
		}
		else if (trim($this->input->post('comment')) == '') {
			$return_result['state'] = 'fail';
		}
        else if ( ! $this->session->has_userdata('user_id')) {
            $return_result['state'] = 'sessionfail';
        }
		else {
        	$affected_rowcnt = $this->talkment_model->set_root_ment($talkboard_name, $talkboard_id);
        	if ($affected_rowcnt == 1)
            	$return_result['state'] = 'ok';
        	else
            	$return_result['state'] = 'dbfail';
		}

        header('Content-Type:text/json');
        echo json_encode($return_result);
    }
       
    public function gecreate($talkboard_name = null)
    {
    	if ( ! $this->input->is_ajax_request())
			exit();
		        
        $talkboard_id = $this->input->post('talk_idx');
        if (empty($talkboard_name) || empty($talkboard_id)) {
            $return_result['state'] = 'paramfail';
		}
		else if ( ! preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", trim($this->input->post('email'))) ) {
			$return_result['state'] = 'fail';			
		}
		else if (trim($this->input->post('comment')) == '' || trim($this->input->post('writer')) == '' || trim($this->input->post('passwd')) == '') {
			$return_result['state'] = 'fail';
		}
		else {
        	$affected_rowcnt = $this->talkment_model->set_root_ment($talkboard_name, $talkboard_id, 'guest');
        	if ($affected_rowcnt == 1)
            	$return_result['state'] = 'ok';
        	else
            	$return_result['state'] = 'dbfail';
		}

        header('Content-Type:text/json');
        echo json_encode($return_result);
    }
    
    public function mentproc($talkboard_name = null)
    {
    	if ( ! $this->input->is_ajax_request())
			exit();
		        
        $talkboard_id = $this->input->post('talk_idx');
        $ment_id = $this->input->post('ment_idx');
        $proc_kind = $this->input->post('submit_kind');
                
        if (empty($talkboard_name) || empty($talkboard_id) || empty($ment_id)) {
            $return_result['result']['state'] = 'paramfail';
		}
		else if (trim($this->input->post('comment')) == '') {
			$return_result['result']['state'] = 'fail';
			$return_result['result']['valimsg'] = '<span class="text-highlights text-highlights-orange">내용을 입력하세요.</span>';
		}
        else if ( ! $this->session->has_userdata('user_id')) {
            $return_result['state'] = 'sessionfail';
        }
		else {
		    		    
            switch ($proc_kind) {                                  
                case '답글등록':
                    $return_result['result']['state'] = $this->talkment_model->set_child_ment($talkboard_name, $ment_id, $talkboard_id);
                    break;         
                case '댓글수정':
                    $return_result['result']['state'] = $this->talkment_model->set_ment_update($talkboard_name, $ment_id);
                    break;
                case '댓글삭제':
                    $return_result['result']['state'] = $this->talkment_model->set_ment_delete($talkboard_name, $ment_id, $talkboard_id);
                    break;                    
                default :
                    $return_result['result']['state'] = 'dbfail';
                    break;
            }
		}		                                   
				
        header('Content-Type:text/json');
        echo json_encode($return_result);
    }

    public function gementproc($talkboard_name = null)
    {
        if ( ! $this->input->is_ajax_request())
            exit();
                
        $talkboard_id = $this->input->post('talk_idx');
        $ment_id = $this->input->post('ment_idx');
        $proc_kind = $this->input->post('submit_kind');
              
        if (empty($talkboard_name) || empty($talkboard_id) || empty($ment_id)) {
            $return_result['result']['state'] = 'paramfail';
        }
        else if (trim($this->input->post('comment')) == '' || trim($this->input->post('writer')) == '' || trim($this->input->post('passwd')) == '') {        
            $return_result['result']['state'] = 'fail';
            $return_result['result']['valimsg'] = '<span class="text-highlights text-highlights-orange">작성자명, 비밀번호, 이메일, 내용은 필수 입력항목입니다.</span>';
        }                       
        else if ( ! preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", trim($this->input->post('email'))) ) {
            $return_result['result']['state'] = 'fail';
            $return_result['result']['valimsg'] = '<span class="text-highlights text-highlights-orange">이메일 형식이 맞지않습니다.</span>';
        }
        else {

            switch ($proc_kind) {                                  
                case '답글등록':
                    $return_result['result']['state'] = $this->talkment_model->set_child_ment($talkboard_name, $ment_id, $talkboard_id, 'guest');
                    break;         
                case '댓글수정':
                    if ($this->talkment_model->set_ment_update($talkboard_name, $ment_id, 'guest') == 'different') {
                        $return_result['result']['state'] = 'fail';
                        $return_result['result']['valimsg'] = '<span class="text-highlights text-highlights-orange">입력한 정보가 댓글 작성자 정보와 일치하지 않습니다.</span>';                        
                    } else {
                        $return_result['result']['state'] = 'ok';
                    }                                        
                    break;
                case '댓글삭제':                    
                    if ($this->talkment_model->set_ment_delete($talkboard_name, $ment_id, $talkboard_id, 'guest') == 'different') {
                        $return_result['result']['state'] = 'fail';
                        $return_result['result']['valimsg'] = '<span class="text-highlights text-highlights-orange">입력한 정보가 댓글 작성자 정보와 일치하지 않습니다.</span>';                        
                    } else {
                        $return_result['result']['state'] = 'ok';
                    }                    
                    break;                    
                default :
                    $return_result['result']['state'] = 'dbfail';
                    break;
            }
        }
                     
        header('Content-Type:text/json');
        echo json_encode($return_result);        
    }
               
}