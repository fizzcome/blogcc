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
<!-- 固定顶部占位 -->
<!-- 导航结束 -->

<?php $this->load->view('admin/head'); ?>
<div class="container">
  <div class="row-fluid">
	  <div class="panel panel-primary">
	      <div class="panel-heading">
	        <h3 class="panel-title" id="panel-title">用户详情<a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
	      </div>

      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>email</th>
            <th>付款方式</th>
            <th>支付交易号</th>
            <!-- <th>截图</th> -->
            <th>查看报表</th>
            <th>审核状态</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
        	<?php foreach($user_list as $k => $v): ?>
	          <tr>
	            <td><?php echo $v['id'] ?></td>
	            <td><?php echo $v['email'] ?></td>
	            <td><?php
		            if(!empty($v['pay_type_name'])){
		            	echo $v['pay_type_name'];
		            }else{
		            	echo "空";
		            }
	             	 ?>
	            </td>
	            <td><?php
		            if(!empty($v['pay_sn'])){
		            	echo $v['pay_sn'];
		            }else{
		            	echo "空";
		            }
	             	 ?>
	            </td>
	            <td style="display:none"><?php
		            if(!empty($v['img_name'])){
		            	echo '<a target="blank" href="/data/upload/'.$v['img_name'].'" ><img width="50" src="/data/upload/'.$v['img_name'].'" /></a>';
		            }else{
		            	echo "空";
		            }
	             	 ?>
	            </td>
              <td><?php
                if(!empty($v['pay_status_name'])){
                  echo '<a target="blank" href="/admin/reg_info_view/'.$v['sn_id'].'">查看报表</a>';
                }else{
                  echo "空";
                }
                 ?>
              </td>
	            <td><?php
		            if(!empty($v['pay_status_name'])){
		            	echo $v['pay_status_name'];
		            }else{
		            	echo "空";
		            }
	             	 ?>
	            </td>
	            <?php 
	            if(!empty($v['pay_status'])):
		            if($v['pay_status'] == 1): 
	            	?>
			            <td><a href="/admin/check/2/<?php echo $v['sn_id'] ?>">通过</a> | <a href="/admin/check/3/<?php echo $v['sn_id'] ?>">不通过</a></td>
			          <?php else: ?>
			            <td>通过 | 不通过</td>
			          <?php endif; ?>
  		        <?php else: ?>
  		        	<td>空</td>
  		        <?php endif; ?>
	          </tr>
	        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

</body>
</html>