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

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		    $this->load->helper('my_definition');
        $this->load->model('web/product_model');
        $this->load->model('web/home_model');
    		$this->load->model('web/kindcode_model');
    }

    public function search($talk_kind = 'all', $srh_mode = 'no', $start_page = null)
	{

    $this->load->helper('my_definition');
		$this->load->helper(array('form', 'url'));
		$this->load->library('pagination');

    //Furni Best
		$data['talkbestTopx'] = $this->home_model->get_talkbestx();
    //▽ Notice ───────────────────────────────────
		$data['noticeTopx'] = $this->home_model->get_noticex();
    //가구 종류 data
    $data['kindcode'] = $this->kindcode_model->get_kind_list();

        if ($this->session->has_userdata('notice_html')) {
            if ($data['noticeTopx'][0]->id > $this->session->userdata('notice_html')[0]['newid']) {
                $notice = array();
                for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                    $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                    $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                    $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                }
                $this->session->set_userdata('notice_html', $notice);
            }
        }
        else {
            $notice = array();
            for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
            }
            $this->session->set_userdata('notice_html', $notice);
        }

		$limit_page = 10;

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
			redirect($this->config->item('base_url') . 'web/market/product/search/' . $talk_kind . '/srh');
		}
		else {
			$paginate_url = '/web/market/product/search/' . $talk_kind . '/' . $srh_mode;
		}

		if ($srh_mode == 'srh') {
			$data['productList'] = $this->product_model->get_product_search($start_page, $limit_page, $talk_kind);
			$total_rows = $this->product_model->get_productsearch_rowcount($talk_kind);
			$data['numbering'] = $total_rows - $start_page;
		}
		else {
			$data['productList'] = $this->product_model->get_product_list($start_page, $limit_page, $talk_kind);
			$total_rows = $this->product_model->get_product_rowcount($talk_kind);
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

		$this->load->view('market/product_search', $data);
	}

    public function soldout($product_idx){
      $result = $this->product_model->soldout($product_idx, 0);

      echo "success";
    }
    public function stockin($product_idx){
      $result = $this->product_model->soldout($product_idx, 1);

      echo "success";
    }
    public function register()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');


        if ( ! $this->session->has_userdata('user_id'))
            redirect($this->config->item('base_url').'web/user/membership');

		if ($this->session->userdata('group_table') == 'manager')
			redirect(base_url('web/market/product/search/all/no'));

        $this->form_validation->set_rules('prod_title', '상품명', 'trim|required');
        $this->form_validation->set_rules('explain', '상세설명', 'trim|required');
        $this->form_validation->set_rules('buy_date', '구입일자', 'required|regex_match[/(\d{4})-(\d{2})/]');
        $this->form_validation->set_rules('buy_price', '구입시가격', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('sell_price', '판매희망가격', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('phone', '연락처', 'trim|required|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
        $this->form_validation->set_rules('address', '주소', 'trim|required');
        $this->form_validation->set_rules('prod_photo_t1', '대표 이미지',  'required');
        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();
        //▽ Notice ───────────────────────────────────
    		$data['noticeTopx'] = $this->home_model->get_noticex();
        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();

            if ($this->session->has_userdata('notice_html')) {
                if ($data['noticeTopx'][0]->id > $this->session->userdata('notice_html')[0]['newid']) {
                    $notice = array();
                    for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                        $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                        $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                        $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                    }
                    $this->session->set_userdata('notice_html', $notice);
                }
            }
            else {
                $notice = array();
                for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                    $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                    $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                    $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                }
                $this->session->set_userdata('notice_html', $notice);
            }

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('market/product_create', $data);
        }
        else {
            $product_id = $this->product_model->set_product();
            if ($product_id > 0) {
                $uploaded_files = $this->_upload_prodimage($product_id);
                $is_uploaded = $this->product_model->set_product_photo($uploaded_files, $product_id);
                $this->product_model->set_goodscount_update('+');

                if ($is_uploaded)
    					       redirect(base_url('web/market/product/detail/'.$product_id.'/rtnlist'));
    				    else
    					       redirect(base_url('web/market/product/update/'.idx.'/rtnlist'));
            }
            else {
                show_404();
            }
        }
    }

    public function update($idx = null, $return_sep = null)
    {
    	$this->load->helper('url');

      //Furni Best
      $data['talkbestTopx'] = $this->home_model->get_talkbestx();
      //▽ Notice ───────────────────────────────────
  		$data['noticeTopx'] = $this->home_model->get_noticex();
      //가구 종류 data
      $data['kindcode'] = $this->kindcode_model->get_kind_list();
          if ($this->session->has_userdata('notice_html')) {
              if ($data['noticeTopx'][0]->id > $this->session->userdata('notice_html')[0]['newid']) {
                  $notice = array();
                  for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                      $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                      $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                      $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                  }
                  $this->session->set_userdata('notice_html', $notice);
              }
          }
          else {
              $notice = array();
              for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                  $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                  $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                  $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
              }
              $this->session->set_userdata('notice_html', $notice);
          }
		$data['productOne'] = $this->product_model->get_product_one($idx);
		if (empty($idx) || empty($data['productOne']))
			show_404();

    	if ($this->session->has_userdata('user_id')) {
    		if ($data['productOne']->userdbtable != $this->session->userdata('group_table') || $data['productOne']->user_id != $this->session->userdata('user_id'))
				redirect(base_url('web/market/product/detail/'.$idx));
		}
		else {
			redirect(base_url('web/market/product/search/all/no'));
		}

		$data['kind_select'][$data['productOne']->kindcode] = TRUE;
		$data['pstate_select'][$data['productOne']->prodstate] = TRUE;
		$data['negoyn_select'][$data['productOne']->negoyn] = TRUE;
		$data['delivery_select'][$data['productOne']->delivery] = TRUE;
		if ($data['productOne']->etcbrandflag == '기타') {
			$data['brand_etcname'] = $data['productOne']->brand;
			$data['brand_select']['기타'] = TRUE;
		} else {
			$data['brand_select'][$data['productOne']->brand] = TRUE;
		}
        if ($return_sep == 'rtnlist') {
            $data['return_jscript'] = 'javascript:window.location.href=\'/web/market/product/search/all/no\';';
			$data['msg_nophoto'] = '대표 이미지가 있어야 마켓에 등록됩니다.';
        } else {
            $data['return_jscript'] = 'javascript:history.back();return false;';
		}

		$data['productPhoto'] = $this->product_model->get_product_photo($idx);

		$this->load->helper(array('form', 'url'));
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('prod_title', '상품명', 'trim|required');
        $this->form_validation->set_rules('explain', '상세설명', 'trim|required');
        $this->form_validation->set_rules('buy_date', '구입일자', 'required|regex_match[/(\d{4})-(\d{2})/]');
        $this->form_validation->set_rules('buy_price', '구입시가격', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('sell_price', '판매희망가격', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('phone', '연락처', 'trim|regex_match[/(^0[0-9]{1,2})-([0-9]{3,4})-([0-9]{4}$)/]');
        $this->form_validation->set_rules('address', '주소', 'trim|required');

	    if ($this->form_validation->run() === FALSE) {
	        $this->load->view('market/product_update', $data);
	    }
	    else {
			$affected_rowcnt = $this->product_model->set_product_update($this->input->post('myproduct_post'), $data['productOne']->kindcode);
			if ($affected_rowcnt == 1)
				redirect(base_url('web/market/product/detail/'.$idx.'/rtnlist'));
			else
				show_404();
	    }
    }

    public function detail($idx = null, $return_sep = null)
    {
        $this->load->helper('url');

        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();

        //▽ Notice ───────────────────────────────────
    		$data['noticeTopx'] = $this->home_model->get_noticex();

        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();
            if ($this->session->has_userdata('notice_html')) {
                if ($data['noticeTopx'][0]->id > $this->session->userdata('notice_html')[0]['newid']) {
                    $notice = array();
                    for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                        $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                        $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                        $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                    }
                    $this->session->set_userdata('notice_html', $notice);
                }
            }
            else {
                $notice = array();
                for ($i = 0; $i < count($data['noticeTopx']); $i++) {
                    $notice[$i]['href'] = '<a href="/web/service/notice/article/' . $data['noticeTopx'][$i]->id . '/rtnlist">' . title_utfcut2($data['noticeTopx'][$i]->title) . '</a>';
                    $notice[$i]['divide'] = '<hr style="margin: 3px 0;">';
                    $notice[$i]['newid'] = $data['noticeTopx'][$i]->id;
                }
                $this->session->set_userdata('notice_html', $notice);
            }
        $data['productOne'] = $this->product_model->get_product_one($idx);
        if (empty($idx) || empty($data['productOne']))
            show_404();

        if ($data['productOne']->state != 'O')
            redirect($this->config->item('base_url') . 'web/market/product/search/all/no');

        $data['productPhoto'] = $this->product_model->get_product_photo($idx);
        $this->product_model->set_readcount_increase($idx);
		    $this->_recentlist_setcookie($idx, $data['productOne']->kindpname, $data['productOne']->brand, $data['productOne']->sellprice);

        $data['productTopx'] = $this->product_model->get_product_samekindx($data['productOne']->id, $data['productOne']->kindcode);
        $data['product2Topx'] = $this->product_model->get_product_sameuserx($data['productOne']->user_id, $data['productOne']->userdbtable, $data['productOne']->id);

        if ($return_sep == 'rtnlist')
            $data['return_jscript'] = 'javascript:window.location.href=\'/web/market/product/search/all/no\';';
        else
            $data['return_jscript'] = 'javascript:history.back();return false;';

        $this->load->view('market/product_oneview', $data);
    }

    public function delete($idx = null)
    {
        $this->load->helper('url');

        //Furni Best
        $data['talkbestTopx'] = $this->home_model->get_talkbestx();
        //가구 종류 data
        $data['kindcode'] = $this->kindcode_model->get_kind_list();
        if ( ! $this->session->has_userdata('user_id'))
            show_404();

        $data['productOne'] = $this->product_model->get_product_one($idx);
        if (empty($idx) || empty($data['productOne']))
            show_404();

        $affected_rowcnt = $this->product_model->set_product_delete($idx, $data['productOne']->kindcode);
        if ($affected_rowcnt == 1) {
            $this->product_model->set_goodscount_update('-');
            redirect(base_url('web/market/product/search/all/no'));
        } else {
            show_404();
        }
    }


    public function paywithseq($duration = null, $kind = null){
      //duration = 1 : 1주
      //duration = 2 : 2주
      //duration = 4 : 4주
      if($duration == 1){
        $data['amt'] = 5000;
      }
      else if($duration == 2){
        $data['amt'] = 10000;
      }
      else if($duration == 4){
        $data['amt'] = 20000;
      }

      if($kind != null){
        $data['kind'] = $kind;
      }

      $this->load->view('tpay/payReq',$data);
    }
    /**
     * 물품 등록폼에서의 이미지파일 업로드
     */
    private function _upload_prodimage($product_id)
    {
        set_time_limit(0);
        ignore_user_abort(true);
        require_once('third_external/VerotUpload.php');

        $image_folder = '/home/hosting_users/furnipeopleweb/www/static/marketphoto/' . date('Ym');
        $thumb_folder = '/home/hosting_users/furnipeopleweb/www/static/marketphoto/' . date('Ym') . '/thumb';

        $files = array();
        foreach ($_FILES['prod_photo'] as $key => $valarr) {
            foreach ($valarr as $i => $fileinfo) {
                if (!array_key_exists($i, $files))
                    $files[$i] = array();
                $files[$i][$key] = $fileinfo;
            }
        }

        $uploadedFiles = array();
        $seq = 0;
        foreach ($files as $file)
        {
            if ($file['name'])
            {
                $handle = new Upload($file);
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
                        $uploadedFiles[$seq]['product_id'] = $product_id;
                        $uploadedFiles[$seq]['seq'] = $seq + 1;
                        $uploadedFiles[$seq]['imageunqname'] = $handle->file_dst_name;
                        $uploadedFiles[$seq]['imagesize'] = round(filesize($handle->file_dst_pathname)/256)/4;
                        $uploadedFiles[$seq]['imagewidth'] = $handle->image_dst_x;
                        $uploadedFiles[$seq]['imageheight'] = $handle->image_dst_y;
                        $uploadedFiles[$seq]['devidefolder'] = date('Ym');
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
                        $uploadedFiles[$seq]['thumunqname'] = $handle->file_dst_name;
                        $uploadedFiles[$seq]['thumsize'] = round(filesize($handle->file_dst_pathname)/256)/4;
                        $uploadedFiles[$seq]['thumwidth'] = $handle->image_dst_x;
                        $uploadedFiles[$seq]['thumheight'] = $handle->image_dst_y;
                    }
                    else {
                        echo '최종 저장 폴더에 템포러리로 부터 카피된 파일이 없습니다. 2<br>';
                        echo 'Error: ' . $handle->error . '<br>';
                    }

                    $seq ++;
                    $handle-> Clean();
                }
            }
        }

        return $uploadedFiles;
    }

	public function ajax_upload_prodimage($seq, $product_id)
	{
		if (empty($product_id) || empty($seq))
			return 'No Product Number or Seq Number';

		require_once('third_external/VerotUpload.php');
        $image_folder = '/home/hosting_users/furnipeopleweb/www/static/marketphoto/' . date('Ym');
        $thumb_folder = '/home/hosting_users/furnipeopleweb/www/static/marketphoto/' . date('Ym') . '/thumb';

		if (isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH'])) {
        	$handle = new Upload('php:'.$_SERVER['HTTP_X_FILE_NAME']);
		}
		else {
        	$handle = new Upload($_FILES['prod_photo']);
		}

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
				$uploadedFile['seqnum'] = $seq;
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

		$this->product_model->set_product_ajaxphoto($product_id, $seq, $uploadedFile);
		echo '/static/marketphoto/' . $uploadedFile['devidefolder'] . '/thumb/' . $uploadedFile['thumunqname'];
	}

    private function _recentlist_setcookie($idx, $talk_kind, $brand, $sellprice)
    {
        $article = array();

        if ($this->input->cookie('recent_goods')) {

            $recent_talks = unserialize($this->input->cookie('recent_goods'));
            $this_articlecode = 'prod_' . $idx;    //prod_9
            $article['code'] = $this_articlecode;
            $article['title'] = $talk_kind;
            $article['link'] = '/web/market/product/detail/' . $idx . '/rtnlist';
            $article['brand'] = $brand;
            $article['price'] = number_format($sellprice);
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
                        'name'   => 'recent_goods',
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
            $article[0]['code'] = 'prod_' . $idx;
            $article[0]['title'] = $talk_kind;
            $article[0]['link'] = '/web/market/product/detail/' . $idx . '/rtnlist';
            $article[0]['brand'] = $brand;
            $article[0]['price'] = number_format($sellprice);

            $final = serialize($article);
            $cookie = array(
                    'name'   => 'recent_goods',
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

}
