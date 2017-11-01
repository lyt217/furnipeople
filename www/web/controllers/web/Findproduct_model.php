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
 *
 *
 * @edit  윤플 임연택  http://www.yunple.co.kr
 */

class Findproduct_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * Product 검색
     */
    public function get_product_find($start_page, $limit_page)
    {
        if ($this->session->has_userdata('find_prod_post')) {
            $find_arr = $this->session->userdata('find_prod_post');
            //$query_kind = null;

            //가구검색어
            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = "(prod.prodtitle LIKE '{$find_word}' OR prod.explain LIKE '{$find_word}') AND ";
            } else {
                $find_word = null;
            }

            //지역
            if ($find_arr['srh_region'] != '') {
                $find_region = "%" . $this->db->escape_like_str($find_arr['srh_region']) . "%";
                $find_region = "prod.address LIKE '{$find_region}' AND ";
            } else {
                $find_region = null;
            }

            //가구종류
            if ($find_arr['srh_gagu'] != '') {
                $find_gagu = $this->db->escape($find_arr['srh_gagu']);
                $find_gagu = "prod.kindpname = {$find_gagu} AND ";
            } else {
                $find_gagu = null;
            }

            //브랜드
            if ($find_arr['srh_brand'] != '') {
                $find_brand = $this->db->escape($find_arr['srh_brand']);
                $find_brand = "prod.brand = {$find_brand} AND ";
            } else {
                $find_brand = null;
            }

            //판매가격
            if ($find_arr['srh_price'] != '') {
                switch ($find_arr['srh_price']) {
                    case 'a':
                        $find_price = "(prod.sellprice BETWEEN 0 AND 100000) AND ";
                    break;    //없으면 여기가 true더라도 실행 후 바로 아래 비교로 흐름이 이어짐
                    case 'b':
                        $find_price = "(prod.sellprice BETWEEN 100000 AND 200000) AND ";
                    break;
                    case 'c':
                        $find_price = "(prod.sellprice BETWEEN 200000 AND 300000) AND ";
                    break;
                    case 'd':
                        $find_price = "(prod.sellprice BETWEEN 300000 AND 400000) AND ";
                    break;
                    case 'e':
                        $find_price = "(prod.sellprice BETWEEN 400000 AND 500000) AND ";
                    break;
                    case 'f':
                        $find_price = "prod.sellprice > 499999 AND ";
                    break;
                    default :
                        $find_price = null;
                    break;
                }
            } else {
                $find_price = null;
            }
        }
        else {
            show_404();    //잘못된 srh uri 입력 방지
        }

        $sql = "SELECT prod.id, prod.prodtitle, prod.mainimage, prod.kindpname, prod.sellprice, prod.brand, prod.prodstate, prod.soldout
            FROM product AS prod WHERE {$find_word}{$find_region}{$find_gagu}{$find_brand}{$find_price} state = 'O' ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";

        //echo $sql;
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Product 검색 로우카운트
     */
    public function get_productfind_rowcount()
    {
            $find_arr = $this->session->userdata('find_prod_post');
            //$query_kind = null;    //조인이 없네

            //가구검색어
            if ($find_arr['find_word'] != '') {
                $find_word = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word = "prod.prodtitle LIKE '{$find_word}' AND ";
            } else {
                $find_word = null;
            }

            //지역
            if ($find_arr['srh_region'] != '') {
                $find_region = "%" . $this->db->escape_like_str($find_arr['srh_region']) . "%";
                $find_region = "prod.address LIKE '{$find_region}' AND ";
            } else {
                $find_region = null;
            }

            //가구종류
            if ($find_arr['srh_gagu'] != '') {
                $find_gagu = $this->db->escape($find_arr['srh_gagu']);
                $find_gagu = "prod.kindpname = {$find_gagu} AND ";
            } else {
                $find_gagu = null;
            }

            //브랜드
            if ($find_arr['srh_brand'] != '') {
                $find_brand = $this->db->escape($find_arr['srh_brand']);
                $find_brand = "prod.brand = {$find_brand} AND ";
            } else {
                $find_brand = null;
            }

            //판매가격
            if ($find_arr['srh_price'] != '') {
                switch ($find_arr['srh_price']) {
                    case 'a':
                        $find_price = "(prod.sellprice BETWEEN 0 AND 100000) AND ";
                    break;
                    case 'b':
                        $find_price = "(prod.sellprice BETWEEN 100000 AND 200000) AND ";
                    break;
                    case 'c':
                        $find_price = "(prod.sellprice BETWEEN 200000 AND 300000) AND ";
                    break;
                    case 'd':
                        $find_price = "(prod.sellprice BETWEEN 300000 AND 400000) AND ";
                    break;
                    case 'e':
                        $find_price = "(prod.sellprice BETWEEN 400000 AND 500000) AND ";
                    break;
                    case 'f':
                        $find_price = "prod.sellprice > 499999 AND ";
                    break;
                    default :
                        $find_price = null;
                    break;
                }
            } else {
                $find_price = null;
            }

        $sql = "SELECT COUNT(prod.id) AS rowcnt FROM product AS prod WHERE {$find_word}{$find_region}{$find_gagu}{$find_brand}{$find_price} state = 'O'";

        $query = $this->db->query($sql);
        $row = $query->row_array();
        //echo '<br>' . $row['rowcnt'];
        return $row['rowcnt'];
    }

}
