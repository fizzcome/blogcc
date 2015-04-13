<?php
// 设置常用公共函数
function v($data){
	echo "<meta charset=utf-8 />";
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function dd($data){
	echo "<meta charset=utf-8 />";
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	exit;
}