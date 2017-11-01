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

class Product_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

	/**
	 * 제품 로우카운트
	 */
	public function get_product_rowcount($talk_kind)
	{
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];
		if (empty($talk_code))
			$talk_kind = 'all';

		if ($talk_kind == 'all') {
			$this->db->select('total');
			$this->db->from('state_rowcnt');
			$this->db->where('identifier', 'product');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row['total'];
		}
		else {
			$this->db->select($talk_code);
			$this->db->from('state_rowcnt');
			$this->db->where('identifier', 'product');
			$query = $this->db->get();
			$row = $query->row_array();
			return $row[$talk_code];
		}
	}

	/**
	 * 키워드 검색시 제품 로우카운트
	 */
	public function get_productsearch_rowcount($talk_kind)
	{
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];
		if (empty($talk_code))
			$talk_kind = 'all';

		if ($talk_kind == 'all') {
			$this->db->select('id');
			$this->db->from('product');
			$this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
			$this->db->where('state', 'O');
			return $this->db->count_all_results();
		}
		else {
			$this->db->select('id');
			$this->db->from('product');
			$this->db->like($this->session->userdata('search_field'), $this->session->userdata('search_keword'));
			$this->db->where('kindcode', $talk_code);
			$this->db->where('state', 'O');
			return $this->db->count_all_results();
		}
	}

	/**
	 * 제품 목록
	 */
	public function get_product_list($start_page, $limit_page, $talk_kind)
	{
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];    //잘못된 $talk_kind uri 입력 방지
		if (empty($talk_code))
			$talk_kind = 'all';

		if ($talk_kind == 'all') {
			$sql = "SELECT * FROM product WHERE state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql);
		}
		else {
			$sql = "SELECT * FROM product WHERE kindcode = ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql, array($talk_code));
		}

		if ($query->num_rows() > 0)
			return $query->result();
	}

	/**
	 * 제품 목록 + 키워드 검색
	 */
	public function get_product_search($start_page, $limit_page, $talk_kind)
	{
		$talk_code_arr = define_talk_code();
		@$talk_code = $talk_code_arr[$talk_kind];    //잘못된 $talk_kind uri 입력 방지
		if (empty($talk_code))
			$talk_kind = 'all';

		if ($this->session->has_userdata('search_keword'))    //잘못된 srh uri 입력 방지
			$like_keyword = '%' . $this->session->userdata('search_keword') . '%';
		else
			show_404();

		if ($talk_kind == 'all') {
			//$sql = "SELECT * FROM talkfree WHERE {$this->session->userdata('search_field')} LIKE '%' ? '%' AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$sql = "SELECT * FROM product WHERE {$this->session->userdata('search_field')} LIKE ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql, array($like_keyword));
		}
		else {
			$sql = "SELECT * FROM product WHERE {$this->session->userdata('search_field')} LIKE ? AND kindcode = ? AND state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
			$query = $this->db->query($sql, array($like_keyword, $talk_code));
		}

		if ($query->num_rows() > 0)
			return $query->result();
	}

    /**
     * 제품 인서트
     */
    public function set_product()
    {
        $talk_kind_arr = define_talk_kind();
        @$talk_kind = $talk_kind_arr[$this->input->post('kind_code')];
        if (empty($talk_kind))
            show_404();

        if (empty($this->input->post('brand_etc'))) {
            $brand = $this->input->post('brand');
			$etcbrandflag = '';
        } else {
            $brand = trim($this->input->post('brand_etc'));
            $etcbrandflag = '기타';
		}

        $data = array(
                'kindcode' => $this->input->post('kind_code'),
                'kindpname' => $talk_kind,
                'prodtitle' => strip_tags(trim($this->input->post('prod_title'))),
                'explain' => strip_tags(trim($this->input->post('explain'))),
                'brand' => $brand,
                'etcbrandflag' => $etcbrandflag,
                'prodstate' => $this->input->post('prod_state'),
                'buydate' => $this->input->post('buy_date'),
                'buyprice' => $this->input->post('buy_price'),
                'sellprice' => $this->input->post('sell_price'),
                'negoyn' => $this->input->post('negotiation'),
                'delivery' => $this->input->post('delivery'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'nickname' => $this->session->userdata('user_nickname'),
                'user_id' => $this->session->userdata('user_id'),
                'userdbtable' => $this->session->userdata('group_table'),
                'srhdate' => date('Ymd'),
                'linkurl' => $this->input->post('linkurl'),
                'size' => $this->input->post('size'),
                'optioninfo' => $this->input->post('optioninfo'),
				'regdate' => date('Y-m-d H:i:s')
            );

        $this->db->insert('product', $data);

        $product_id = $this->db->insert_id();
        if ($this->db->affected_rows() == 1) {
            $sql = "UPDATE state_rowcnt SET total = total+1, {$this->input->post('kind_code')} = {$this->input->post('kind_code')}+1 WHERE identifier = 'product'";
            $this->db->query($sql);
            return $product_id;
        } else {
            return 0;
        }
    }

    /**
     * 제품 이미지정보 인서트
     */
    public function set_product_photo($uploaded_files = null, $product_id)
    {
        if (empty($uploaded_files)) {
			$this->db->set('state', '대기');
			$this->db->where('id', $product_id);
			$this->db->update('product');
			return FALSE;
        } else {
            //echo '첨부파일 있음';
            //print_r($uploaded_files);
            $this->db->insert_batch('prodphoto', $uploaded_files);

			$mainimage = $uploaded_files[0]['devidefolder'] . '/thumb/' . $uploaded_files[0]['thumunqname'];
			$this->db->set('mainimage', $mainimage);
			$this->db->where('id', $product_id);
			$this->db->update('product');
			return TRUE;
        }
    }

    /**
     * 제품 이미지정보 Ajax 업데이트
     */
    public function set_product_ajaxphoto($product_id, $seq, $uploaded_file)
	{
		$mainimage = $uploaded_file['devidefolder'] . '/thumb/' . $uploaded_file['thumunqname'];

		$data = array(
				'imageunqname' => $uploaded_file['imageunqname'],
				'imagesize' => $uploaded_file['imagesize'],
				'imagewidth' => $uploaded_file['imagewidth'],
				'imageheight' => $uploaded_file['imageheight'],
				'devidefolder' => $uploaded_file['devidefolder'],
				'thumunqname' => $uploaded_file['thumunqname'],
				'thumsize' => $uploaded_file['thumsize'],
				'thumwidth' => $uploaded_file['thumwidth'],
				'thumheight' => $uploaded_file['thumheight']
			);
		$this->db->where('product_id', $product_id);
		$this->db->where('seq', $seq);
		$this->db->update('prodphoto', $data);

		if ($this->db->affected_rows() == 0) {
			//업데이트 된게 없으면 인서트
			$this->db->select_max('seq');
			$this->db->where('product_id', $product_id);
			$query = $this->db->get('prodphoto');
			$row = $query->row_array();
			$max_seq = $row['seq'];

			$data['product_id'] = $product_id;
			$data['seq'] = $max_seq + 1;
			$this->db->insert('prodphoto', $data);

			//1번 대표이미지면 마켓에 노출 허가
			if ($data['seq'] == 1) {
				$this->db->set('mainimage', $mainimage);
				$this->db->set('state', 'O');
				$this->db->where('id', $product_id);
				$this->db->update('product');
			}
		}
		else {
			//대표 사진을 갱신한 것이므로
			if ($seq == 1 && $this->db->affected_rows() == 1) {
				$this->db->set('mainimage', $mainimage);
				$this->db->where('id', $product_id);
				$this->db->update('product');
			}
		}
	}

	/**
	 * 제품 업데이트
	 */
	public function set_product_update($product_id, $old_kindcode)
	{
		$talk_kind_arr = define_talk_kind();
		@$talk_kind = $talk_kind_arr[$this->input->post('kind_code')];
		if (empty($talk_kind) || empty($product_id))
			show_404();

        if (empty($this->input->post('brand_etc'))) {
            $brand = $this->input->post('brand');
			$etcbrandflag = '';
        } else {
            $brand = trim($this->input->post('brand_etc'));
            $etcbrandflag = '기타';
		}

        $data = array(
                'kindcode' => $this->input->post('kind_code'),
                'kindpname' => $talk_kind,
                'prodtitle' => strip_tags(trim($this->input->post('prod_title'))),
                'explain' => strip_tags(trim($this->input->post('explain'))),
                'brand' => $brand,
                'etcbrandflag' => $etcbrandflag,
                'prodstate' => $this->input->post('prod_state'),
                'buydate' => $this->input->post('buy_date'),
                'buyprice' => $this->input->post('buy_price'),
                'sellprice' => $this->input->post('sell_price'),
                'negoyn' => $this->input->post('negotiation'),
                'delivery' => $this->input->post('delivery'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'nickname' => $this->session->userdata('user_nickname'),
                'updeldate' => date('Y-m-d H:i:s'),
                'linkurl' => $this->input->post('linkurl'),
                'size' => $this->input->post('size'),
                'optioninfo' => $this->input->post('optioninfo')
            );

		$this->db->where('id', $product_id);
		$this->db->update('product', $data);

		//$this->db->affected_rows() 가 1이고 카테고리를 변경하였다면 통계 테이블 업데이트
		if ($this->db->affected_rows() == 1 && $old_kindcode != $this->input->post('kind_code')) {
			$sql = "UPDATE state_rowcnt SET {$this->input->post('kind_code')} = {$this->input->post('kind_code')}+1, {$old_kindcode} = {$old_kindcode}-1 WHERE identifier = 'product'";
			$this->db->query($sql);
			return $this->db->affected_rows();
		} else if ($this->db->affected_rows() == 1 && $old_kindcode == $this->input->post('kind_code')) {
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}

    /**
     * 제품 하나 가져옴
     */
    public function get_product_one($idx)
    {
        $query = $this->db->get_where('product', array('id' => $idx), 1);
        return $query->row();
    }

    /**
     * 제품 사진목록 가져옴
     */
    public function get_product_photo($idx)
    {
        $query = $this->db->get_where('prodphoto', array('product_id' => $idx));

        if ($query->num_rows() > 0)
            return $query->result_array();
    }

	/**
	 * 열람 조회수 카운트 증가
	 */
	public function set_readcount_increase($idx)
	{
		$this->db->set('readcount', 'readcount+1', FALSE);
		$this->db->where('id', $idx);
		$this->db->update('product');
	}

    /**
     * 제품 하나 삭제 (실삭제 안하고 상태만 변경), 관리자에서는 상태복원시 게시물의 코멘트 총계를 바꿔야 함
     */
    public function set_product_delete($idx, $old_kindcode)
    {
        $data = array(
                'state' => '삭제',
                'updeldate' => date('Y-m-d H:i:s')
            );
        $this->db->where('id', $idx);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('userdbtable', $this->session->userdata('group_table'));
        $this->db->update('product', $data);

        //통계 테이블 카운트 감소 (전체, 카테고리)
        if ($this->db->affected_rows() == 1) {
            $sql = "UPDATE state_rowcnt SET total = total-1, {$old_kindcode} = {$old_kindcode}-1 WHERE identifier = 'product'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    /**
     * 제품 상세보기 하단에 같은 가구 카테고리 제품 3개 전시
     */
    public function get_product_samekindx($idx, $kindcode)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('kindcode', $kindcode);
        $this->db->where_not_in('id', $idx);
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 제품 상세보기 하단에 같은 유저의 제품 3개 전시
     */
    public function get_product_sameuserx($user_id, $userdbtable, $idx)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('user_id', $user_id);
        $this->db->where('userdbtable', $userdbtable);
        $this->db->where_not_in('id', $idx);
        $this->db->where('state', 'O');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get();

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * 유저의 마이상품등록된수총수 갱신
     */
    public function set_goodscount_update($adjust_sym)
    {
        //$adjust_sym 에는 +, - 가 넘어옴
        if ($this->session->userdata('group_table') == 'member') {
            $sql = "UPDATE member SET goodscount = goodscount{$adjust_sym}1 WHERE usrcode = '{$this->session->userdata('user_code')}'";
            $this->db->query($sql);
        }
        else if ($this->session->userdata('group_table') == 'provider') {
            $sql = "UPDATE provider SET goodscount = goodscount{$adjust_sym}1 WHERE usrcode = '{$this->session->userdata('user_code')}'";
            $this->db->query($sql);
        }
    }



    public function soldout($product_idx, $state){
      if($state == 0){
        $data = array(
                'soldout' => '매진'
            );

        $this->db->where('id', $product_idx);
        $this->db->update('product', $data);
        return $this->db->affected_rows();
      }
      else{
        $data = array(
                'soldout' => '재고있음'
            );

        $this->db->where('id', $product_idx);
        $this->db->update('product', $data);
        return $this->db->affected_rows();
      }
    }

}
