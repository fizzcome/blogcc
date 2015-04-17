(function(vui){
vui.onfocus = function(ev){
	var bground = $(ev).css('background');
	if(bground == '#ffffff'){
		
	}
};
vui.payShow = function(el){
	$('.payMessage',$(el).parents('.tableModule')).toggle();
};
vui.input = {
	'focus' : function(ev){
		$(ev).css({'background':'#fff'});
	},
	'blur' : function(ev){
		$(ev).css({'background':'#f1f1f1'});
	}
};
function getSubH(){
	var _h = $('.main').height();
	$('.sub').css({
		'height':_h+'px'
	});
}
vui.helper = function(){
	if($('#helpModule').length != 0) return;
	if($('.import').length == 0 ) return;
	var setCookie = function(name,val){
		var cookies = document.cookie,
			str =  name + '=' + val;
		document.cookie = str;
	},
	getCookie = function(name){
		var temp = false;
		var cookieArray = document.cookie.split(';');
		$(cookieArray).each(function(){
			var arr = this.split('=');
			if($.trim(arr[0]) == 'SIEHELPER'){
				temp = true;
			}
		});
		return temp;
	},
	temp = 0,
	eles = ['.import .tit','.plan div','.nav .service'],
	inner = [{
			'title': vui.ms('tager').a,
			'sub' : vui.ms('tager').b,
			'map' : 'top',
			'left' : 76,
			'top' : 23
		},
		{
			'title': vui.ms('tager').c,
			'sub' : vui.ms('tager').d,
			'map' : 'bottom',
			'left' : 76,
			'top' : -149
		},
		{
			'title': vui.ms('tager').e,
			'sub' : vui.ms('tager').f,
			'map' : 'bottom',
			'left' : 76,
			'top' : -200
		}],
	createTag = function(num){
		var dom = document.createElement('div');
		if(inner[num].map == 'bottom'){
			$(dom).attr({'id':'helpTagerSub'});
		}else{
			$(dom).attr({'id':'helpTager'});
		}
		$('body').append(dom);
		var str = '<h3>'+inner[num].title+'</h3>';
			str += '<div class="bd">'+inner[num].sub+'</div><ul>';
			for(var i=0;i<eles.length;i++){
				if(i == num){
					str += '<li class="c cur"></li>';
				}else{
					str += '<li class="c"></li>';
				}
			}
			if(num != eles.length - 1){
				str += '</ul><span class="mit"><span>Next</span></span>';
			}else{
				str += '</ul><span class="mit"><span>Enter</span></span>';
			}
			
		$(dom).html(str);
		$(dom).css({
			'left' : $(eles[num]).offset().left +inner[num].left + 'px',
			'top' : $(eles[num]).offset().top +inner[num].top + 'px'
		});
		$('.mit',dom).click(function(){
			if(num == 2){
				vui.setClearWH('close');
				setCookie('SIEHELPER','1');
			}else{
				temp = temp + 1;
				createTag(temp);
			}
			$(dom).remove();
		});
		
	};
	function createHelper(){
		var htmlStr = '<div><img src="jsp/images/user/welcome_logo.jpg" /></div>';
			htmlStr += '<div class="pp"><p>'+vui.ms('help').a+'</p>';
			htmlStr += '<p>'+vui.ms('help').b+'</p>';
			htmlStr += '<p>'+vui.ms('help').c+'</p>';
			htmlStr += '</div><div><img src="jsp/images/user/welcome_banner.png" /></div><span class="mit">'+vui.ms('start').a+'</span>';
		var helperDom = document.createElement('div');
			$(helperDom).attr({'id':'helpModule'});
			$(helperDom).html(htmlStr);
		document.body.appendChild(helperDom);
		$(helperDom).css('height',$('.page').height() + 66 + 'px');
		$('#helpModule .mit').click(function(){
			$('#helpModule').remove();
			createTag(temp);
		});
		
	}
	var _cookie = getCookie('SIEHELPER');
	//判断是否是第一次登录，如果第一登录继续，如果填过信息等操作后直接返回函数
	if($('.addNew').attr('style') != 'left:0;'){
		return 
	}
	//判断cookie，不存在cookie值才继续
	if(!_cookie){
		vui.setClearWH('open',function(){
			createHelper();
		});
	}
};
vui.selectcourse = function(op,id){
	function createAjaxed(){
		$.ajax({
			type: "get",
			url: "/index.php?action=selectcourse&list_id="+id+"&op="+op,
			beforeSend: function(XMLHttpRequest){},
			success: function(data){
				if(data.error==0){
					
				}else{
					alert(data.msg);	
				}	
			}
		});
	}
};
function refundOrder(){
	var _parnets = $(this).parents('.tableModule');
	var el,origin,subHttp,http;
	origin = window.location.origin;
	subHttp = '/refund.action?orderForm.id=';
	http =subHttp + _parnets.attr('orderId');
	function createRefundBox(){
		var str = '<form id="form1"name="form1"method="post"action=""><table border="1"cellspacing="0"cellpadding="0"align="left"><tr><p style="text-align:center;font-weight:bold;font-size:14px;padding:10px 0;">2013 SIE International Summer School<br/>Refund Application Form</p></tr><tr><td width="130">Student Name</td><td width="438"colspan="3"valign="top"><label for="name"></label><input type="text"style="width:150px;"name="name"id="name"/></td></tr><tr><td width="130">Email</td><td width="438"colspan="3"valign="top"><label for="mail"></label><input type="text"style="width:150px;"name="mail"id="mail"/></td></tr><tr><td width="130">Phone Number</td><td width="154"valign="top"><label for="phone"></label><input type="text"style="width:150px;"name="phone"id="phone"/></td><td width="142">Campus</td><td width="142"valign="top"><label for="textfield"></label><input type="text"style="width:150px;"name="textfield"id="textfield"/></td></tr><tr><td width="130">Order Number</td><td width="154"valign="top"><label for="orderNum"></label><input type="text"style="width:150px;"name="orderNum"id="orderNum"/></td><td width="142">Refund Amount</td><td width="142"valign="top"><label for="refund"></label><input type="text"style="width:150px;"name="refund"id="refund"/></td></tr><tr><td width="130">Refund Reason</td><td width="438"colspan="3"valign="top"><label for="reason"></label><input type="text"style="width:150px;"name="reason"id="reason"/></td></tr><tr><td width="130"rowspan="5"valign="top">Payment Method<br/>(Please check the method that you used to make payment to SIE)</td><td width="438"colspan="3"valign="top">Paypal Online<input type="radio"name="radio"id="paypal"value="paypal"/><label for="paypal"></label></td></tr><tr><td width="438"colspan="3"valign="top">China Unionpay Online银联在线支付<input type="radio"name="radio"id="CUOnline"value="CUOnline"/><label for="CUOnline"></label></td></tr><tr><td width="438"colspan="3"valign="top">Bank transfer to HSBC<input type="radio"name="radio"id="hsbc"value="hsbc"/><label for="hsbc"></label></td></tr><tr><td width="438"colspan="3"valign="top">Bank transfer to中信银行<input type="radio"name="radio"id="banktransfer"value="banktransfer"/><label for="banktransfer"></label>or招商银行<input type="radio"name="radio"id="zsbank"value="zsbank"/><label for="zsbank"></label></td></tr><tr><td width="438"colspan="3"valign="top">Cash payment at UIBE<input type="radio"name="radio"id="cashUIBE"value="cashUIBE"/><label for="cashUIBE"></label>or ECNU<input type="radio"name="radio"id="cashECNU"value="cashECNU"/><label for="cashECNU"></label></td></tr><tr><td width="130"rowspan="5"valign="top">Refund Payment<br/>Information</p></td><td width="438"colspan="3"valign="top">Beneficiary bank/开户行名称（具体到分行和支行名称）<label for="benBank"></label><input type="text"style="width:150px;"name="benBank"id="benBank"/></td></tr><tr><td width="438"colspan="3"valign="top">Beneficiary Person/收款人<br/><label for="benPer"></label><input type="text"style="width:150px;"name="benPer"id="benPer"/></td></tr><tr><td width="438"colspan="3"valign="top">Account/账号<br/><input type="text"style="width:150px;"name="account"id="account"/></td></tr><tr><td width="438"colspan="3"valign="top">Swift code(Only if you want us to transfer US dollars to your account outside China)<br/><label for="swiftCode"></label><input type="text"style="width:150px;"name="swiftCode"id="swiftCode"/></td></tr><tr><td width="438"colspan="3"valign="top">Paypal account(Only if you paid fees via Paypal and want to get refund to your Paypal account)<br/><label for="paypalAccount"></label><input type="text"style="width:150px;"name="paypalAccount"id="paypalAccount"/></td></tr><tr><td style="padding:10px 0;text-align:center;" width="568"colspan="4"><input type="submit"name="commit"id="commit"value="确定"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit"name="close"id="close"value="取消"/></td></tr></table></form>';
		var box = document.createElement('div');
		$(box).addClass('refundBox');
		$(box).html(str);
		$('.sie').append(box);
	}
	vui.setClearWH('open',createRefundBox);
}
window.onload = window.onresize = function(){
	vui.correctPageHeight('.main');
	//vui.correctPageHeight('.sub');
	vui.correctPageHeight('.page');
	vui.payMoney();
	getSubH();
	vui.helper();
};
})(vui);