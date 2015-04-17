<?php if($this->session->userdata('email')): ?>

<link rel="stylesheet" type="text/css" href='/data/css/common/common.css'/>
<div class="pageHeader">
		<div class="inner">
			<a href="/" class="logo" title="辅仁暑校 Fujen Summer School 2014">
				<img src="/data/images/common/hd-log.png" alt="辅仁暑校 Fujen Summer School 2014" />
			</a>
			<span style="width: 250px; float: left; height: 20px; line-height: 22px;"> | <a href="/" title="辅仁暑校 Fujen Summer School 2014"> 辅仁暑校 Fujen Summer School 2014 </a></span>
			<div id="u">
				<a href="/admin"> <?php echo $info = $this->session->userdata('email'); ?></a>
				<a id="logout" href="/user/logout">退出</a>
				<!-- <a href="http://apply.fujenedu.org/index.php?action=goto&back=http%3A%2F%2Fapply.fujenedu.org%2Fgetpassword.htm&lang=en_us">English</a>      -->
			</div>
		</div>
</div>
<?php else: ?>
<div class="pageHeader">
		<div class="inner">
			<a href="/" class="logo" title="辅仁暑校 Fujen Summer School 2014">
				<img src="/data/images/common/hd-log.png" alt="辅仁暑校 Fujen Summer School 2014" />
			</a>
			<span style="width: 250px; float: left; height: 20px; line-height: 22px;"> | <a href="/" title="辅仁暑校 Fujen Summer School 2014"> 辅仁暑校 Fujen Summer School 2014 </a></span>
			<div id="u">
				<a id="login" href="/admin/login_admin">登陆</a>
				<!-- <a href="http://apply.fujenedu.org/index.php?action=goto&back=http%3A%2F%2Fapply.fujenedu.org%2Fgetpassword.htm&lang=en_us">English</a>      -->
			</div>
		</div>
</div>
<?php endif; ?>