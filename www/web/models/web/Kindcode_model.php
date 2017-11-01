<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kindcode_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    /**
     * kindcode 전체 리스트
     */
    public function get_kind_list()
    {

        $sql = "SELECT * FROM kindtable";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * kindcode 전체 리스트 로우카운트
     */
    public function get_kind_rowcount()
    {
        $sql = "SELECT COUNT(id) AS rowcnt FROM kindtable";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }

    /**
     * Provider 검색
     */
    public function get_shop_find($start_page, $limit_page)
    {
        if ($this->session->has_userdata('find_shop_post')) {
            $find_arr = $this->session->userdata('find_shop_post');
            $query_kind = null;

            if ($find_arr['find_word'] != '') {
                $find_word1 = $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word1 = "shop.corpname LIKE '{$find_word1}' OR ";

                $find_word2 = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word2 = "shop.hashtag LIKE '{$find_word2}' AND ";
            } else {
                $find_word1 = null;
                $find_word2 = null;
            }

            if ($find_arr['srh_region'] != '') {
                $find_region = $this->db->escape_like_str($find_arr['srh_region']) . "%";
                $find_region = "shop.addressjibun LIKE '{$find_region}' AND ";
            } else {
                $find_region = null;
            }

            if ($find_arr['srh_bizkind'] != '') {
                $find_bizkind = $this->db->escape($find_arr['srh_bizkind']);
                $find_bizkind = "shop.bizcategory = {$find_bizkind} AND ";
            } else {
                $find_bizkind = null;
            }

            if ($find_arr['srh_gagu'] != '') {
                $find_gagu = $this->db->escape($find_arr['srh_gagu']);
                $find_gagu = "prod.kindpname = {$find_gagu} AND ";
                $query_kind = 'join';
            } else {
                $find_gagu = null;
            }

            if ($find_arr['srh_brand'] != '') {
                $find_brand = $this->db->escape($find_arr['srh_brand']);
                $find_brand = "prod.brand = {$find_brand} AND ";
                $query_kind = 'join';
            } else {
                $find_brand = null;
            }
        }
        else {
            show_404();
        }

        if (empty($query_kind)) {
            $sql = "SELECT shop.id, shop.corpname, shop.addressjibun, shop.latitude, shop.longitude, shop.bizcategory, shop.corpphone, shop.introduce, shop.corplogo, shop.hashtag
                FROM provider AS shop WHERE {$find_word1}{$find_word2}{$find_region}{$find_bizkind} state = 'O' ORDER BY addressjibun ASC LIMIT {$start_page}, {$limit_page}";
        }
        else {
            $sql = "SELECT shop.id, shop.corpname, shop.addressjibun, shop.latitude, shop.longitude, shop.bizcategory, shop.corpphone, shop.introduce, shop.corplogo, shop.hashtag
            FROM provider AS shop JOIN product AS prod
            ON shop.id = prod.user_id AND prod.userdbtable = 'provider' AND {$find_word1}{$find_word2}{$find_region}{$find_bizkind}{$find_gagu}{$find_brand} shop.state = 'O'
            ORDER BY shop.addressjibun ASC LIMIT {$start_page}, {$limit_page}";
        }

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0)
            return $query->result();
    }

    /**
     * Provider 검색 로우카운트
     */
    public function get_shopfind_rowcount()
    {
        $find_arr = $this->session->userdata('find_shop_post');
        $query_kind = null;

            if ($find_arr['find_word'] != '') {
                $find_word1 = $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word1 = "shop.corpname LIKE '{$find_word1}' OR ";

                $find_word2 = "%" . $this->db->escape_like_str($find_arr['find_word']) . "%";
                $find_word2 = "shop.hashtag LIKE '{$find_word2}' AND ";
            } else {
                $find_word1 = null;
                $find_word2 = null;
            }

            if ($find_arr['srh_region'] != '') {
                $find_region = $this->db->escape_like_str($find_arr['srh_region']) . "%";
                $find_region = "shop.addressjibun LIKE '{$find_region}' AND ";
            } else {
                $find_region = null;
            }

            if ($find_arr['srh_bizkind'] != '') {
                $find_bizkind = $this->db->escape($find_arr['srh_bizkind']);
                $find_bizkind = "shop.bizcategory = {$find_bizkind} AND ";
            } else {
                $find_bizkind = null;
            }

            if ($find_arr['srh_gagu'] != '') {
                $find_gagu = $this->db->escape($find_arr['srh_gagu']);
                $find_gagu = "prod.kindpname = {$find_gagu} AND ";
                $query_kind = 'join';
            } else {
                $find_gagu = null;
            }

            if ($find_arr['srh_brand'] != '') {
                $find_brand = $this->db->escape($find_arr['srh_brand']);
                $find_brand = "prod.brand = {$find_brand} AND ";
                $query_kind = 'join';
            } else {
                $find_brand = null;
            }

        if (empty($query_kind)) {
            $sql = "SELECT COUNT(shop.id) AS rowcnt FROM provider AS shop WHERE {$find_word1}{$find_word2}{$find_region}{$find_bizkind} state = 'O'";
        }
        else {
            $sql = "SELECT COUNT(shop.id) AS rowcnt
            FROM provider AS shop JOIN product AS prod
            ON shop.id = prod.user_id AND prod.userdbtable = 'provider' AND {$find_word1}{$find_word2}{$find_region}{$find_bizkind}{$find_gagu}{$find_brand} shop.state = 'O'";
        }

        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['rowcnt'];
    }

}
