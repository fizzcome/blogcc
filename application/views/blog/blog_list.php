<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>blogcc</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- 可选的Bootstrap主题文件（一般不用引入） -->
  <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
  <style>
    /*.clearfix{clear:both; margin-top:4em;}*/
    li { list-style :none;}
  </style>
</head>
<body style="color: rgb(0, 0, 0); background-color: rgb(204, 232, 207);" class="responsive">
<!-- 导航栏 -->
<div class="row-fluid">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">博客长城</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">推荐</a></li>
        <li><a href="#about">前端</a></li>
        <li><a href="#contact">后端</a></li>
        <li><a href="#contact">工具</a></li>
        <li><a href="#contact">其他</a></li>
        <li><a href="#contact">站长CMS</a></li>
      </ul>
      <!-- 右边区域 -->
      <ul class="nav navbar-nav navbar-right">
        <?php if(empty($login_status)): ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">fizz <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="blog/add_view">博客发布</a></li>
              <li><a href="#">博客管理</a></li>
              <li class="divider"></li>
              <li><a href="#">退出登陆</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="dropdown">
            <a href="#" class="" role="button">登陆 </a>
          </li>
        <?php endif; ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
</div>
<!-- 固定顶部占位 -->
<div class="navbar"></div>
<!-- 导航结束 -->

<div class="container">
  <div class="row-fluid diannaoduan">
      <?php foreach ($list as $key => $value):?>
          <div class="thumbnail col-md-3">
            <img alt="300x200" src="/data/image/<?php echo $value->face ?>"/>
            <div class="caption">
              <h4>
                <?php echo $value->title ?>
              </h4>
              <p>
                <?php echo $value->introduce ?>
              </p>
              <p>
                <a class="btn btn-primary" href="#">浏览</a> <a class="btn" href="#">分享</a>
              </p>
            </div>
          </div>
      <?php endforeach; ?>
  </div>
  <div class="row-fluid shoujiduan">
    <ul class="col-md-12">
      <?php foreach ($list as $key => $value):?>
        <li class="col-md-3">
          <div class="thumbnail">
            <img alt="300x200" src="/data/image/<?php echo $value->face ?>"/>
            <div class="caption">
              <h5><b>
                <?php echo $value->title ?>
              </b></h5>
              <p>
                <?php echo $value->introduce ?>
              </p>
              <p>
                <a class="btn btn-primary" href="/blog/blog_detail/<?php echo $value->id ?>">浏览</a> <a href="/blog/edit/<?php echo $value->id ?>" class="btn">编辑</a>
              </p>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
  <div class="row-fluid">
    <?php foreach ($list as $key => $value):?>
      <div class="media col-md-6">
         <a href="#" class="pull-left"><img src="<?php echo base_url() ?>data/image/<?php echo $value->face ?>" width=100 class="media-object" alt='' /></a>
        <div class="media-body">
          <h4 class="media-heading">
            <?php echo $value->title ?>
          </h4> 
          <?php echo $value->introduce ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

</div>

<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script>
$(function(){
  function browserRedirect() {
      var sUserAgent = navigator.userAgent.toLowerCase();
      var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
      var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
      var bIsMidp = sUserAgent.match(/midp/i) == "midp";
      var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
      var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
      var bIsAndroid = sUserAgent.match(/android/i) == "android";
      var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
      var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
      if (!(bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) ){
          $('.diannaoduan').hide();
          // window.location.href="http://www.qq.com";
      }else{
          $('.shoujiduan').hide();
          // window.location.href="http://wap.yy.com";
      }
  }
  browserRedirect();
});

</script>
</body>
</html>