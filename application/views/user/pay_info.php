<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>首页</title>
<link rel="stylesheet" href="/data/css/common.css" />

</head>
<body>
<?php $this->load->view('common/head') ?>

<div class="main">
	<div class="maincon">
    	<h1>申请费支付</h1>
        <p>申请人需要向辅仁博雅支付500元申请费，用于招生委员会对申请材料的审核费用。申请费为一次性费用，不可退回，不可追溯。在收到申请人报名费后，我们将开放申请表格供申请人填写，并随后由招生委员会进行资料审核。若您通过审核，将获得三门讲座课程的全额奖学金。申请全部细则，请查看《申请规则说明》。</p>
        <p>若您已通过微信支付或其他方式支付过申请费，请选择"已支付过500元报名费"，并上传您的支付截屏凭证。若您还未支付，请选择"现在支付500元报名费"，并按照提示，进行支付，完成后，请上传您的支付截屏凭证。</p>
        <p>如有疑问，请联系。021-32501783 （工作时间：周一至周五，上午十点至下午六点。）</p>
        
        
        <!-- <form action="user/pay_info" method="post"> -->
        <?php echo form_open_multipart('user/pay_info');?>
        	<div class="pay"><a href="javascript:;" class="yi-pay" id="mypay">已支付过500元报名费</a><a href="javascript:;" class="no-pay">现在支付500元报名费</a></div>
            <div class="no-paycon" style="display:none;"><img src="/data/images/no-payimg.jpg" width="622" height="208" /></div>
            <div class="divinput">
                <label>付款方式：</label>
                <select name="type">
                	<option value="1">微信支付</option>
                    <option value="2">支付宝支付</option>
                    <option value="3">银行转账</option>
                </select>
            </div>
            <div class="divinput"><label>支付交易号：</label><input type="text" name="sn" class="text" onKeyUp="javascript:this.value=this.value.replace(/[^\w\.\/]/ig,'');" onChange="javascript:this.value=this.value.replace(/[^\w\.\/]/ig,'');" /><span class="texterror">请正确填写支付交易号</span></div>
            <!-- <div class="divinput"><label>转账截图：</label><input type="file" class="file" name="file" /><span class="fileerror">请选择正确文件</span><span class="filejpg">请选择jpg格式文件</span></div> -->
            <!-- <span class="no-button">确认提交</span> -->
            <input type="submit" value="确认提交" class="button" onClick="check2();" />
        </form>
    </div>
</div>
<footer>
	<div>
    	<p>Copyright @ 2014 Fujen International Education Group Limited</p>
        <p>联系我们&nbsp;&nbsp;&nbsp;&nbsp;沪ICP备13005632</p>
    </div>
</footer>

<script language="javascript" src="/data/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
	$(function(){
		$(".yi-pay").click(function(){
			$(this).attr("id","mypay");
			$(".no-paycon").hide();
			$(this).siblings().attr("id","");
			
		})
		$(".no-pay").click(function(){
			$(this).attr("id","mypay");
			$(".no-paycon").show();
			$(this).siblings().attr("id","");
		})
	})
	
	
	function check2(){
		//验证支付交易号
		var textjyh = $(".text").val();
		if(textjyh == ""){
			$(".texterror").show();
			return false;
		}else{
			$(".texterror").hide();
		}
		
		//验证上传文件是否选择
		var file = $(".file").val();
		if(file==""){
			$(".fileerror").show();
			return false;
		}else{
			$(".fileerror").hide();
		}
		var strTemp = file.split(".");
		var strCheck = strTemp[strTemp.length-1];
		if(strCheck.toUpperCase()=='JPG'){
			$(".filejpg").hide();
			return true;
		}else{
			$(".filejpg").show();
			return false;
		}
	} 
</script>
</body>
</html>