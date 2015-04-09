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

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

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
      <a class="navbar-brand" href="#">后台管理系统</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <!-- 右边区域 -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
</div>
<!-- 固定顶部占位 -->
<div class="navbar"></div>
<!-- 导航结束 -->
<div class="container">
  <div class="row-fluid">
    <span>博客列表</span>
    <span class="pull-right">
      <a href="blog/insert_view"><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 添加博客</button></a>
    </span>
    <hr>
  </div>
<!-- 	<div class="row-fluid table-respo32e">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th>ID</th>
                <th>封面</th>
                <th>标题</th>
                <th>分类</th>
                <th>发布时间</th>
                <th>修改时间</th>
                <th>操作时间</th>
                <th>操作</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <div class="fizz-block">
                <tr>
                  <td>1</td>
                  <td rowspan=2 style="width:50px;height:50px;"><img src="./image/test.jpg" height="50" alt=""></td>
                  <td>第一篇博客</td>
                  <td>record</td>
                  <td>2015-4-4 20:00:00</td>
                  <td>2015-4-4</td>
                  <td>2015-4-4</td>
                	<td>
                		<a href="#" title="编辑"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-edit"></button></a>
                		<a href="#" title="禁用"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-ok"></button></a>
                		<a href="#" title="置顶"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-open"></button></a></td>
                </tr>
                <tr>
                	<td></td>
                	<td colspan="5">本站第一篇博客, 从此开始立脚</td>
                	<td><a href="#" title="查看"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-eye-open">查看</button></a></td>
                </tr>
              </div>
              <div class="fizz-block">
                <tr>
                  <td>1</td>
                  <td rowspan=2 style="width:50px;height:50px;"><img src="./image/test.jpg" height="50" alt=""></td>
                  <td>第一篇博客</td>
                  <td>record</td>
                  <td>2015-4-4 20:00:00</td>
                  <td>2015-4-4</td>
                  <td>2015-4-4</td>
                  <td>
                    <a href="#" title="编辑"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-edit"></button></a>
                    <a href="#" title="禁用"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-ok"></button></a>
                    <a href="#" title="置顶"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-open"></button></a></td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan="5">本站第一篇博客, 从此开始立脚</td>
                  <td><a href="#" title="查看"><button type="button" class="btn btn-xs btn-info glyphicon glyphicon-eye-open">查看</button></a></td>
                </tr>
              </div>

            </tbody>
          </table>
  </div> -->
<!-- <div class="row-fluid">
  <div class="col-md-4">
    <div class="row-fluid"><img src="./image/32.jpg" alt=""></div>
    <div class="row-fluid"><h3>this is title</h3></div>
    <div class="row-fluid"><p>this is content this is content this is content this is content this is content this is content this is content</p></div>
    <div class="row-fluid"><button class="btn btn-success">浏览</button></div>
  </div>
  <div class="col-md-4">
    <div class="row-fluid"><img src="./image/32.jpg" alt=""></div>
    <div class="row-fluid"><h3>this is title</h3></div>
    <div class="row-fluid"><p>this is content this is content this is content this is content this is content this is content this is content</p></div>
    <div class="row-fluid"><button class="btn btn-success">浏览</button></div>
  </div>
</div> -->
  <div class="row-fluid diannaoduan">
      <?php foreach ($list as $key => $value):?>
          <div class="thumbnail col-md-3">
            <img alt="300x200" src="<?php echo base_url() ?>data/image/<?php echo $value->face ?>"/>
            <div class="caption">
              <h3>
                <?php echo $value->title ?>
              </h3>
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
            <img alt="300x200" src="<?php echo base_url() ?>data/image/<?php echo $value->face ?>"/>
            <div class="caption">
              <h3>
                <?php echo $value->title ?>
              </h3>
              <p>
                <?php echo $value->introduce ?>
              </p>
              <p>
                <a class="btn btn-primary" href="#">浏览</a> <a class="btn" href="#">分享</a>
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
// function browserRedirect() {
//     var sUserAgent = navigator.userAgent.toLowerCase();
//     var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
//     var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
//     var bIsMidp = sUserAgent.match(/midp/i) == "midp";
//     var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
//     var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
//     var bIsAndroid = sUserAgent.match(/android/i) == "android";
//     var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
//     var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
//     if (!(bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) ){

//         window.location.href="http://www.qq.com";
//     }else{
//         window.location.href="http://wap.yy.com";
//     }
// }

</script>
</body>
</html>