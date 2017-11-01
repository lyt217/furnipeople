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

class Besttalk_model extends CI_Model 
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_article_rowcount($srh_mode = 'no')
    {           
        $this->db->select('total');
        $this->db->from('state_rowcnt');
        $this->db->where('identifier', 'besttalk');
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['total'];
    }

    public function get_article_list($start_page, $limit_page, $srh_mode = 'no')
    {       
        $sql = "SELECT * FROM besttalk ORDER BY id DESC LIMIT {$start_page}, {$limit_page}";
        $query = $this->db->query($sql);            
        
        if ($query->num_rows() > 0)
            return $query->result();    
    }    
    
    public function has_article_being($taklboard_name, $talkboard_idx)
    {       
        $this->db->select('id');
        $this->db->from('besttalk');
        $this->db->where('taklboard_name', $taklboard_name);
        $this->db->where('talkboard_id', $talkboard_idx);
        $query = $this->db->get();

        if ($query->num_rows() > 0)   
            return TRUE;    //존재하면
        else
            return FALSE;
    } 
    
    public function get_sourearticle_one($source_bdname, $source_idx)
    {
        $this->db->select('id, title, writer, mentcount, readcount, regdate');
        $this->db->from($source_bdname);
        $this->db->where('id', $source_idx);
        //$this->db->where('state', 'O');
        $query = $this->db->get();
        return $query->row();
    }
    
    public function set_article_copy($articleOne, $source_bdname)
    {                                          
        $data = array(
                'bestseq' => 1,    //임시로 1번 부여
                'taklboard_name' => $source_bdname,
                'talkboard_id' => $articleOne->id,
                'title' => $articleOne->title,
                'writer' => $articleOne->writer,
                'mentcount' => $articleOne->mentcount,
                'readcount' => $articleOne->readcount,
                'regdate' => $articleOne->regdate,               
                'srhdate' => date('Ymd')
            );

        $this->db->insert('besttalk', $data);

        if ($this->db->affected_rows() == 1) {          
            $sql = "UPDATE state_rowcnt SET total = total+1 WHERE identifier = 'besttalk'";
            $this->db->query($sql);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }
    
    public function set_article_copyupdate($articleOne, $best_idx)
    {                                          
        $data = array(
                'title' => $articleOne->title,
                'writer' => $articleOne->writer,
                'mentcount' => $articleOne->mentcount,
                'readcount' => $articleOne->readcount
            );

        $this->db->where('id', $best_idx);
        $this->db->update('besttalk', $data);
        return $this->db->affected_rows();
    }
       
    public function del_article_one($idx)
    {
        $this->db->delete('besttalk', array('id' => $idx));
        if ($this->db->affected_rows() == 1) {
            $sql = "UPDATE state_rowcnt SET total = total-1 WHERE identifier = 'besttalk'";
            $this->db->query($sql);
        }
    }        
    
}