<?php

/*
 * 无限级分类
 */
function get_cate($cate_arr,$html="--",$pid=0,$level=0){
	$arr = array();
	foreach ($cate_arr as $k => $v){
		if($v['pid'] == $pid){
			$v['level'] = $level;
			$v['html'] = str_repeat($html,$level);
			$arr[] = $v;
			$arr = array_merge($arr,get_cate($cate_arr,$html,$v['id'],$level+1));
		}
	}
	return $arr;
}
