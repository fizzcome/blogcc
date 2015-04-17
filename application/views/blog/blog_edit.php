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
              <li><a href="<?php echo site_url() ?>/blog/add_view">博客发布</a></li>
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
  <form class="form-horizontal" action="add" method="post" role="form">
     <div class="form-group">
        <label for="title" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
           <input type="text" class="form-control" name="title" id="title" 
              placeholder="请输入标题" value="<?php echo $edit[0]['title'] ?>">
        </div>
     </div>
     <div class="form-group">
        <label for="category" class="col-sm-2 control-label">分类</label>
        <div class="col-sm-8">
          <select name="cate_id" class="form-control">
            <option value="0">请选择</option>
            <?php foreach ($cate_list as $key => $value): ?>
              <option value="<?php echo $value['id'] ?>"><?php echo $value['html'].$value['name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
            <button class="btn btn-primary btn-sm col-xs-6 btn-block" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><span class="glyphicon glyphicon-wrench"></span> 分类管理 </button>
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
            <input type="hidden" name="face" value="" />
          </div>
          <span class="col-sm-8 col-xs-5">
           <img src="/data/image/demo.jpg" alt="">
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
              placeholder="请输入博客内容" rows="36" value="<?php echo $edit[0]['content'] ?>"></textarea>
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
            <li role="presentation" class="active"><a href="#panel-1" aria-controls="panel-1" role="tab" data-toggle="tab">添加分类</a></li>
            <li role="presentation" class=""><a href="#panel-2" aria-controls="panel-2" role="tab" data-toggle="tab">编辑分类</a></li>
            <li role="presentation" class=""><a href="#panel-3" aria-controls="panel-3" role="tab" data-toggle="tab">删除分类</a></li>
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
                     <option value="0">顶级分类</option>
                      <?php foreach ($cate_list as $key => $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['html'].$value['name'] ?></option>
                      <?php endforeach; ?>
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
                     <option value="0">顶级分类</option>
                     <?php foreach ($cate_list as $key => $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['html'].$value['name'] ?></option>
                      <?php endforeach; ?>
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
                     <option value="0">顶级分类</option>
                     <?php foreach ($cate_list as $key => $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['html'].$value['name'] ?></option>
                      <?php endforeach; ?>
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
        <button type="button" class="btn btn-primary fizz-confirm" onClick="doSubmit()">确定</button>
      </div>
    </div>
  </div>
</div>

<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
   /*
  * 分类操作的提交
  */
  $('.fizz-confirm').click(function(){
    $('.tab-pane').each(function(){
        var formid;
        var thiss = $(this);
        if(thiss.hasClass('active')){
          thiss.find('form').submit();
        }
        
    });
  });


});
</script>
</body>
</html>