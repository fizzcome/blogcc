<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="utf-8" />
<title>辅仁暑校 Fujen Summer School 2014</title>
<meta name="keywords" content="辅仁暑校 Fujen Summer School 2014" />
<meta name="description" content="辅仁暑校 Fujen Summer School 2014" />
<link rel="stylesheet" type="text/css" href='/data/css/common/common.css'/>
<script language="JavaScript" src="/data/js/common/jquery.js"></script>
<script language="JavaScript" src='/data/js/common/vui.js'></script>
<link rel="stylesheet" type="text/css" href="/data/css/login/login.css"/>
<script language="JavaScript" src="/data/js/common/jquery.linscroll.js"></script>
<script language="JavaScript" src='/data/js/login/login.js'></script>
	
</head>
<body class="zh_cn">
<?php $this->load->view('common/head'); ?>


<div class="sie">
	<div class="page login" tn="login">
		<div class="logo">
			<a href="http://apply.fujenedu.org">
				
			</a>
		</div>
		<!--loginModule_start-->
		<!--<img src="/data/images/common/app_logo.png"/>
			userLogin start
		-->
		<form  action="/user/login" method="post" name="login" id="form1">
		<div class="loginBox userLogin" style="">
			<div class="l">
				<h3>用户登录</h3>
				<div class="loginMessage">
					<div class="userName">
						<input type="text" value="" class="isGetFocus" autocomplete="off" name="email"/>
						
					</div>
					<div class="passWord"><input type="password" value="" name="password" /></div>
				</div>
				<div class="submit">
					<!-- <a class="forgot" href="/user/getpassword">忘记密码 ?</a> -->
					<span class="mit">
						<input type="submit" value="登录"   onclick="return vui.check('form1');"/>
					</span>	
				</div>
			</div>
			<div class="r">
				<img src="/data/images/login/loginMessage_cn.jpg"/>
				<a class="mits" href="/user/register">注册帐号</a>
			</div>
			<b class="tag"></b>
		</div>
		</form>
		<!--loginModule_end-->
	</div>
</div>
<div class="pageFooter">
	<div class="inner">
		
		<div class="toper">
			<div class="logo"></div>
			<div class="copyRight">
				<p>Copyright © 2014 Fujen International Education Group Limited</p>
				<ul class="about">
					<li class="l"><a href="http://summer.fujenedu.org/cn/general-information/" target="_blank">联系我们</a></li>
					<li class="l">沪ICP备13005632</li>
				</ul>
			</div>
			
		</div>
	</div>
</div><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fb31c89963467c4a12ad30d79fb9a2248' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
