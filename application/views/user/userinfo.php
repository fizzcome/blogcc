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
<link rel="stylesheet" href="/data/css/user/user.css" type="text/css">
<script type="text/javascript" src="/data/js/common/jquery.date_input.js"></script>
<link rel="stylesheet" href="/data/css/common/date_input.css" type="text/css">
<script language="JavaScript" src="/data/js/common/Univ.js"></script>
<script language="JavaScript" src='/data/js/user/user.js'></script>
	
</head>
<body class="zh_cn">
<?php $this->load->view('common/head'); ?>
<div class="sie">
	<div class="page userPage" tn="user" lan="zh_cn">
		
		<div class="sub" style="display:none;">
		<a href="/" class="logo" title="辅仁暑校 Fujen Summer School 2014"><img src="/data/images/common/logo.png" height="150" alt="辅仁暑校 Fujen Summer School 2014" /></a>
		<div class="line"></div>
		<ul class="nav">
			<li class="home">
				<a  href="index.htm">首页</a>
			</li>
			<li class="profile">
				<a class="cur" href="userinfo.htm">个人资料</a>
			</li>
			<li class="order">
				<a  href="myorder.htm">订单</a>
			</li>
			<li class="course">
				<a  href="mycourse.htm">课程</a>
			</li>
			<li class="service">
				<a  href="myservice.htm">更多</a>
			</li>
			<li class="service">
				<a   href="help.htm">帮助</a>
			</li>
		</ul>
		<div class="line"></div>
		<div class="courseShowListerParent">
			<div class="courseShowLister" onClick="vui.showList()">
				<h3>我的课程安排</h3>
				<ul class="courser">
									<li class="a"><a href="courselist_1000.htm">上海师范大学：高一高二</a></li>
									<li class="a"><a href="courselist_1001.htm">上海师范大学：高三</a></li>
									<li class="a"><a href="courselist_1002.htm">辅仁写作课程</a></li>
								</ul>
			</div>
		</div>
		</div>
		
		<div class="main">
			<div class="mainWrap pro">
				<div class="proTitle">
					<h3><b>个人信息</b></h3>
				</div>
				<form  action="/userinfo.htm" method="post" name="profile" id="form1">
				<input type="hidden" name="user_id" value="131"/>
				<div class="proModule">
					<div class="bd">
						<div class="p">
							<span class="name">姓*</span><input type="text" name="lastName" len="30" value="2323" />
							<span class="name ac">名*</span><input type="text" name="firstName" len="30" value="323" />
						</div>
						<div class="p">
							<span class="name">中文名</span><input id="chineseName" len="30" onblur="vui.isType.CN($(this).attr('value'),this)" type="text" name="ChineseName" value="手动发送" />
							<span class="name ac">性别*</span>
							<input class="radio" type="radio" name="gender" value="0" checked/>
							<span class="radioVal">男</span>
							<input class="radio" type="radio" name="gender" value="1"  />
							<span class="radioVal">女</span>
						</div>
						<div class="p">
							<span class="name">出生日期*</span><input type="text" value="04/09/2015" id="datepicker"  onblur="vui.isType.data($(this).attr('value'),this)" name="birth" />
						</div>
						<div class="p">
							<span class="name" style="width:121px;">身份证/护照号*</span><input type="text"  len="30" name="idNumber" style="width:490px;" value="310228195487454545" />
						</div>
						<div class="p">
							<span class="name">街道，门牌号*</span><input style="width:490px;" len="255" type="text" name="street" value="2131" />
						</div>
						<div class="p">
							<span class="name">城市*</span><input  type="text" len="100" name="city" value="2132" />
							<span class="name">州/省*</span><input  len="100" type="text" name="state" value="3213" />
						</div>
						<div class="p">
							<span class="name">邮编*</span><input type="text" len="15" name="postalCode" value="123131" />
							<span class="name">国家*</span><input onfocus="" type="text" value="巴巴多斯" name="country" class="country" onclick="vui.Unvi.selCounInit('countrySelectBox',this);" />
						</div>
						<div class="p">
							<span class="name">Email*</span><input type="text" len="100" name="email" value="123456@163.com" />
							<span class="name">国籍*</span><input type="text" name="citizentship"  class="citizentship" value="保加利亚" onclick="vui.Unvi.selCounInit('countrySelectBox',this);" />
						</div>
						<div class="p heighter">
							<span class="name">电话号码*</span><input type="text" len="30" id="tel" name="americaPhone" value="12321313" />
							<span class="name">电话号码 (中国)*</span><input type="text" id="telChina" len="30" name="chinaPhone" value="2132132" />
						</div>
						<div class="p">
							<span class="name" style="display:inline;">就读学校*</span></br>
							<input type="text" style="width:612px;margin-top:10px;" class="school" name="schoolName" value="复旦大学" onclick="vui.Unvi.init('schoolSelectBox',this);"/>
						</div>
						<div class="p">
							<span class="name">年级*</span>
							<select class="select" style="width:170px" id="graduation" type="text" name="grade">
								<option value='2014' selected>2014</option>
								<option value='2015' >2015</option>
								<option value='2016' >2016</option>
								<option value='2017' >2017</option>
								<option value='高中生' >高中生</option>
							</select> 
							<span class="name">专业*</span><input type="text" len="200" name="major" value="2" />
						</div>
						<div class="p">
							<span class="name">GPA*</span><input type="text" id="GPA" name="gpa" value="2" onblur="vui.isType.GPA($(this).attr('value'),this)" />
						</div>
					</div>
					<div class="ft">
						<div class="checkMsg" ><span>请认真填写以上表格，"*"为必填项，谢谢！<span class="ad"></span></span></div>
						<input class="sel" type="submit" value="保存" onclick="return vui.check('form1','user');"/>
					</div>
				</div>
				</form>
				<!--school-->
			</div>
		</div>
		
		

<script language="JavaScript" src="/data/js/user/profile.js"></script>
<script>
$(function() {
	$( "#datepicker" ).datepicker({
		changeYear: true,
		yearRange:'c-30:c+10'
	});
	$( "#graduation" ).datepicker({
		changeYear: true,
		yearRange:'c-30:c+10'
	});
});
</script>
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
</div></body>
</html>