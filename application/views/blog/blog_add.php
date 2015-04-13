<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>blogcc</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>data/bootstrap-3.3.4-dist/css/bootstrap.min.css"> -->

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<!-- <link rel="stylesheet" href="./bootstrap-3.3.4-dist/css/bootstrap-theme.min.css"> -->

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <!-- 
	<script src="./bootstrap-3.3.4-dist/js/jquery.min.js"></script>
 -->
  <!-- Bootstrap core CSS -->
  <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

  <!-- Optional Bootstrap Theme -->
  <link href="data:text/css;charset=utf-8," data-href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<!-- // <script src="./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script> -->
<!-- 
  <script src="http://files.cnblogs.com/rubylouvre/bootstrap-modal.js"></script>  
 -->
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
    <span>添加博客</span>
    <span class="pull-right">
      <a href="./index.html"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> 博客列表</button></a>
    </span>
    <hr>
  </div>
  <form class="form-horizontal" action="add" method="post" role="form">
     <div class="form-group">
        <label for="title" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
           <input type="text" class="form-control" name="title" id="title" 
              placeholder="请输入标题">
        </div>
     </div>
     <div class="form-group">
        <label for="category" class="col-sm-2 control-label">分类</label>
        <div class="col-sm-8">
          <select name="cate_id" class="form-control">
            <option value="0">请选择</option>
            <?php foreach ($category as $key => $value): ?>
              <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
            <?php endforeach; ?>
          </select>
        </div>
<!--         <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-addon btn btn-primary" type="button"><span class="glyphicon glyphicon-plus"></span>添加</span>
          </div>
        </div> -->
        <div class="col-sm-2"></div>
        <div class="col-sm-2">

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->
            <button class="btn btn-primary btn-sm col-xs-6 btn-block" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="glyphicon glyphicon-wrench"></span> 分类管理 </button>
<!--           <span class="col-sm-3">
            <button class="btn btn-primary btn-sm col-xs-6 btn-block" type="button" onclick="addCategory(this);"><span class="glyphicon glyphicon-remove"></span> 删除分类 </button>
          </span>
          <span class="col-sm-3">
            <button class="btn btn-primary btn-sm col-xs-6 btn-block" type="button" onclick="addCategory(this);"><span class="glyphicon glyphicon-edit"></span> 编辑分类 </button>
          </span>
          <span class="col-sm-3">
            <button class="btn btn-primary btn-sm col-xs-6 btn-block" type="button" onclick="addCategory(this);"><span class="glyphicon glyphicon-wrench"></span> 分类管理 </button>
          </span> -->
        </div>

          


     </div>

     <div class="form-group">
        <label for="introduce" class="col-sm-2 control-label">封面</label>
        <div class="col-sm-10">
          <div class="col-sm-2">
            <span class="col-sm-12 col-xs-6">
              <button type="button" class="btn btn-primary btn-sm btn-block"><span aria-hidden="true" class="glyphicon glyphicon-upload"></span> &nbsp;上 传</button>
            </span>
            <span class="col-sm-12 col-xs-6">
              <button type="button" class="btn btn-primary btn-sm btn-block"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> &nbsp;删 除</button>
            </span>
          </div>
          <span class="col-sm-8 col-xs-5">
           <img src="data/image/demo.png" alt="">
          </span>
        </div>
     </div>
     <div class="form-group">
        <label for="introduce" class="col-sm-2 control-label">简介</label>
        <div class="col-sm-10">
           <input type="text" class="form-control" name="introduce" id="introduce" 
              placeholder="请输入简介">
           <span class="help-block">用一句简短明了的话描述本文的内容</span>
        </div>
     </div>
     <div class="form-group">
        <label for="mark" class="col-sm-2 control-label">标签</label>
        <div class="col-sm-10">
           <input type="text" class="form-control" name="mark" id="mark" 
              placeholder="请输入标签">
           <span class="help-block">多个标签用英文逗号(,)隔开, 最多可输入5个标签</span>
        </div>
     </div>
     <div class="form-group">
        <label for="content" class="col-sm-2 control-label">定时发布</label>
        <div class="col-sm-10">
           <input type="text" class="form-control" name="content" id="content" 
              placeholder="请点击选择发布时间" value="<?php echo time() ?>">
        </div>
     </div>
     <div class="form-group">
        <label for="content" class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
           <textarea type="text" class="form-control" name="content" id="content" 
              placeholder="请输入博客内容" rows="6"></textarea>
        </div>
     </div>
     <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
           <input type="submit" class="btn btn-default" value="发布">
        </div>
     </div>
  </form>
</div>


<!-- 弹出层区域 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">分类操作</h4>
      </div>
      <div class="modal-body">
        <div role="tabpanel">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified" role="tablist" id="category_manage">
            <li role="presentation" class="active"><a href="http://caibaojian.com/demo/2015/3/bootstrap-tabs.html#panel-1" aria-controls="panel-1" role="tab" data-toggle="tab">添加分类</a></li>
            <li role="presentation" class=""><a href="http://caibaojian.com/demo/2015/3/bootstrap-tabs.html#panel-2" aria-controls="panel-2" role="tab" data-toggle="tab">编辑分类</a></li>
            <li role="presentation" class=""><a href="http://caibaojian.com/demo/2015/3/bootstrap-tabs.html#panel-3" aria-controls="panel-3" role="tab" data-toggle="tab">删除分类</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <!-- 添加分类 -->
            <div role="tabpanel" class="tab-pane active" id="panel-1">

              <?php echo form_open('blog/category_add') ?>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">选择父级分类:</label>
                  <div class="">
                    <select name="cate_id" class="form-control">
                     <option>请选择</option>
                     <option value="1">php</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="message-text" class="control-label">添加分类名称:</label>
                  <input type="text" class="form-control" name="category-name">
                </div>
              </form>

            </div><!--/.tab-panel -->
            <!-- 编辑分类 -->
            <div role="tabpanel" class="tab-pane" id="panel-2">

              <?php echo form_open('blog/category_edit') ?>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">选择分类:</label>
                  <div class="">
                    <select name="cate_id" class="form-control">
                     <option>请选择</option>
                     <option value="1">php</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="message-text" class="control-label">编辑分类名称:</label>
                  <input type="text" class="form-control" name="category-name">
                </div>
              </form>

            </div><!--/.tab-panel -->

            <!-- 删除分类 -->
            <div role="tabpanel" class="tab-pane" id="panel-3">

              <?php echo form_open('blog/category_del') ?>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">选择分类:</label>
                  <div class="">
                    <select name="cate_id" class="form-control">
                     <option>请选择</option>
                     <option value="1">php</option>
                    </select>
                  </div>
                </div>
              </form>

            </div><!--/.tab-panel -->

          </div> <!--/.tab-content -->

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onClick="doSubmit()">确定</button>
      </div>
    </div>
  </div>
</div>

<div id="ccdd">123</div>

<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
   /*
  * 分类操作的提交
  */
  function doSubmit(){
    alert(3)
    var formid = $('#ccdd').html();
    // alert(formid)
      $('#category_manage li').each(fucntion(){
        alert($(this).attr('aria-controls'))
    //     if($(this).hasClass('active')){
    //       formid = $(this).attr('aria-controls');
    //     }
      });
    //   alert(formid)
    // $('#'+formid).find('form').submit();
  }

doSubmit();
});
</script>
<script>
  // alert(5)

/*
 *
 */

 /*
  *
  */





/*
 *  判断手机端或者电脑端登陆
 */
  // 添加分类框显示
  // function addCategory(this){
    // alert(3)
    // $(this).parent().prev().show();
  // }
  //  判断设备是pc或手机
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
  //         $('.diannaoduan').hide();
  //         // window.location.href="http://www.qq.com";
  //     }else{
  //         $('.shoujiduan').hide();
  //         // window.location.href="http://wap.yy.com";
  //     }
  // }
  // browserRedirect();
// });

</script>
</body>
</html>