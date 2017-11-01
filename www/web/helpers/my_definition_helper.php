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

	function define_talk_kind() {
	    $talk_kind = array(
	    		'a' => '자유',
	    		'b' => '의자',
	    		'c' => '책상',
	    		'd' => '쇼파',
	    		'e' => '침대',
	    		'f' => '화장대',
	    		'g' => '식탁',
	    		'h' => '수납장',
	    		'i' => '서랍',
	    		'j' => '인테리어 제품',
	    		'k' => '기타 가구들'
	    	);
		return $talk_kind;
	}

    function df_talkcode_kname($talk_code)
    {
        $code = array(
                'a' => '자유',
                'b' => '의자',
                'c' => '책상',
                'd' => '쇼파',
                'e' => '침대',
                'f' => '화장대',
                'g' => '식탁',
                'h' => '수납장',
                'i' => '서랍',
                'j' => '인테리어 제품',
                'k' => '기타 가구들'
            );
        @$talk_kname = $code[$talk_code];
        if (empty($talk_kname))
            return '자유';
        else
            return $talk_kname;
    }

	function define_talk_code() {
	    $talk_code = array(
	    		'free' => 'a',
	    		'chair' => 'b',
	    		'desk' => 'c',
	    		'sofa' => 'd',
	    		'bed' => 'e',
	    		'dresser' => 'f',
	    		'dtable' => 'g',
	    		'closet' => 'h',
	    		'drawer' => 'i',
	    		'interior' => 'j',
	    		'etc' => 'k'
	    	);
		return $talk_code;
	}

    function df_uri_talkcode($uri_code, $only_arrdata = null) {
        $code = array(
                'free' => 'a',
                'chair' => 'b',
                'desk' => 'c',
                'sofa' => 'd',
                'bed' => 'e',
                'dresser' => 'f',
                'dtable' => 'g',
                'closet' => 'h',
                'drawer' => 'i',
                'interior' => 'j',
                'etc' => 'k'
            );

        if ($only_arrdata == 'data')
            return $code;

        @$talk_code = $code[$uri_code];
        if (empty($talk_code))
            return 'a';
        else
            return $talk_code;
    }

    function df_talk_uri($talk_code) {
        $code = array(
                'a' => 'free',
                'b' => 'chair',
                'c' => 'desk',
                'd' => 'sofa',
                'e' => 'bed',
                'f' => 'dresser',
                'g' => 'dtable',
                'h' => 'closet',
                'i' => 'drawer',
                'j' => 'interior',
                'k' => 'etc'
            );
        @$uri_seg = $code[$talk_code];
        if (empty($uri_seg))
            return 'all';
        else
            return $uri_seg;
    }

    //요걸로 하나씩 변경
    function df_talkcode_uri($talk_code) {
        $code = array(
                'a' => 'free',
                'b' => 'chair',
                'c' => 'desk',
                'd' => 'sofa',
                'e' => 'bed',
                'f' => 'dresser',
                'g' => 'dtable',
                'h' => 'closet',
                'i' => 'drawer',
                'j' => 'interior',
                'k' => 'etc'
            );
        @$uri_seg = $code[$talk_code];
        if (empty($uri_seg))
            return 'all';
        else
            return $uri_seg;
    }

    /**
     * 문자열 제한적 출력
     */
    function title_utfcut($str) {
        if (preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $str)) {
            //return '한글 포함됨';
            $str_length = mb_strlen($str, 'UTF-8');
            if ($str_length > 36)
                return mb_substr($str, 0, 36, 'UTF-8') . '..';    //36자만 리턴
            else
                return $str;
        }
        else {
            //return '한글 미포함됨';
            $str_length = mb_strlen($str, 'UTF-8');
            if ($str_length > 70)
                return mb_substr($str, 0, 70, 'UTF-8') . '..';
            else
                return $str;
        }
    }

    /**
     * 문자열 제한적 출력 (메인페이지)
     */
    function title_utfcut2($str, $mtcount) {
			if($mtcount == null){
				$mtcount = 0;
			}
      if($mtcount > 0){
        if (preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $str)) {
            $str_length = mb_strlen($str, 'UTF-8');
            if ($str_length > 16)
                return mb_substr($str, 0, 16, 'UTF-8') . '..';
            else
                return $str;
        }
        else {
            $str_length = mb_strlen($str, 'UTF-8');
            if ($str_length > 226)
                return mb_substr($str, 0, 22, 'UTF-8') . '..';
            else
                return $str;
        }
      }
      else{
          if (preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $str)) {
              $str_length = mb_strlen($str, 'UTF-8');
              if ($str_length > 20)
                  return mb_substr($str, 0, 20, 'UTF-8') . '..';
              else
                  return $str;
          }
          else {
              $str_length = mb_strlen($str, 'UTF-8');
              if ($str_length > 26)
                  return mb_substr($str, 0, 26, 'UTF-8') . '..';
              else
                  return $str;
          }
        }
    }

    /**
     * 문자열 제한적 출력 (최근본글)
     */
    function title_utfcut3($str) {
        if (preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $str)) {
            $str_length = mb_strlen($str, 'UTF-8');
            if ($str_length > 15)
                return mb_substr($str, 0, 15, 'UTF-8') . '..';
            else
                return $str;
        }
        else {
            $str_length = mb_strlen($str, 'UTF-8');
            if ($str_length > 24)
                return mb_substr($str, 0, 24, 'UTF-8') . '..';
            else
                return $str;
        }
    }

    function df_board_title($board_kind) {
        $board = array(
                'talkfree' => 'Furni Talk',
                'talkqna' => 'Furni Q&A',
                'talkreview' => 'Furni Review',
                'talkinfo' => 'Furni Info',
                'talkphoto' => 'Furni Photos',
                'talkadvertise' => 'Furni Ads'
            );
        @$board_title = $board[$board_kind];
        if (empty($board_title))
            return '';
        else
            return $board_title;
    }

    function df_furni_point($table_name) {
        $define = array(
                'talkfree' => 10,
                'talkqna' => 10,
                'talkreview' => 100,
                'talkinfo' => 100,
                'talkphoto' => 30,
                'talkadvertise' => 0
            );
        @$point = $define[$table_name];
        if (empty($point))
            return 0;
        else
            return $point;
    }
