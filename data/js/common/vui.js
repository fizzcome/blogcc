(function(window){
/*
* 命名空间，存储vui
*/
var version = '1.0.3 build 2012009001',
	win = window,
	vui = win['vui'] = win['VUI'] = win['V'] = {
		gid : '@VUI@'
	};
vui.ms = function(val){
	var options = {
		'wait' : {
			'cn' : {
				'a' : '加入等候列表'
			},
			'en' : {
				'a' : 'Add To Waitlist'
			}
		},
		'def' : {
			'cn' : {
				'a' : '可选'
			},
			'en' : {
				'a' : 'Select Course'
			}
		},
		'un' : {
			'cn' : {
				'a' : '不可选'
			},
			'en' : {
				'a' : 'Not Available'
			}
		},
		'sel' : {
			'cn' : {
				'a' : '已选'
			},
			'en' : {
				'a' : 'Selected'
			}
		},
		'help' : {
			'cn' : {
				'a' : '欢迎加入SIE 国际暑期学校联盟！',
				'b' : '您可以通过这里在线申请SIE国际暑期学校项目，并且将学分转回学校。',
				'c' : '点击下方的“开始”按钮，开始在线申请。'
			},
			'en' : {
				'a' : 'Congratulations! Welcome to SIE Alliance of International Summer Sessions, the first, largest and most recognized summer session program in China.',
				'b' : 'Here, you can apply for our program, complete tuition payments, and register for classes.',
				'c' : 'Click the "start" button below to be guided through your online application process.'
			}
		},
		'tager' : {
			'cn' : {
				'a' : '01. 通知',
				'b' : '关于SIE国际暑期学校联盟的信息会在这里时时更新，请定期点击查询。',
				'c' : '02. 申请步骤',
				'd' : '申请一共分为四步骤完成。',
				'e' : '03. 更多选项',
				'f' : '在完成申请之后，您可以随时点击“更多选项”来更改你的个人信息和订单细节。您也可以选择校内住宿以及旅游等服务。'
			},
			'en' : {
				'a' : '01. Announcement',
				'b' : 'New messages and updates will be posted here. Please check back regularly.',
				'c' : '02. Application Process',
				'd' : '4 steps in total to complete your application:STEP 01: Update profile STEP 02: Place order STEP 03: Update receipt STEP 04: Select courses',
				'e' : '03. More Options',
				'f' : 'After you complete the application process, you can always modify your personal information and order details by clicking the "more" button.'
			}
		},
		'next' : {
			'cn' : {
				'a' : '继续下一步'
			},
			'en' : {
				'a' : 'Next'
			}
		},
		'enter' : {
			'cn' : {
				'a' : '进入'
			},
			'en' : {
				'a' : 'Enter'
			}
		},
		'start' : {
			'cn' : {
				'a' : '开始'
			},
			'en' : {
				'a' : 'Start'
			}
		},
		'select' : {
			'cn' : {
				'a' : '选择'
			},
			'en' : {
				'a' : 'Select'
			}
		},
		'save' : {
			'cn' : {
				'a' : '保存'
			},
			'en' : {
				'a' : 'save'
			}
		},
		'weixin' : {
			'cn' : {
				'a' : '学员福利大派送—获取二维码，赢iPhone 5！'
			},
			'en' : {
				'a' : 'Win iPhone5 from SIE! Join us and get your QR Code!'
			}
		},
		'replace' : {
			'cn' : {
				'a' : '替换'
			},
			'en' : {
				'a' : 'Substitute for'
			}
		},
		'yes' : {
			'cn' : {
				'a' : '是'
			},
			'en' : {
				'a' : 'Yes'
			}
		},
		'no' : {
			'cn' : {
				'a' : '否'
			},
			'en' : {
				'a' : 'No'
			}
		},
		'commit' : {
			'cn' : {
				'a' : '请确认对方已付款！'
			},
			'en' : {
				'a' : '请确认对方已付款！'
			}
		},
		'loading' : {
			'cn' : {
				'a' : '正在处理您的请求，请稍候…'
			},
			'en' : {
				'a' : 'We are processing your request…'
			}
		},
		'discount' : {
			'cn' : {
				'a' : '你必须选中一门课程！'
			},
			'en' : {
				'a' : 'You mast be to choose a course!'
			}
		},
		'setCourseErr' : {
			'cn' : {
				'a' : '错误提示: 以下课程注册失败.'
			},
			'en' : {
				'a' : 'Error: The course(s) listed below was not added to your schedule.'
			}
		},
		'setCourseSuccess' : {
			'cn' : {
				'a' : '确认，是否返回主页面？',
				'b' : '确定'
			},
			'en' : {
				'a' : 'Would you like to continue to the home page?',
				'b' : 'confirm'
			}
		},
		'beyound' : {
			'cn' : {
				'a' : '您所选择的课程已达到上限.'
			},
			'en' : {
				'a' : 'You have reached your course limit. '
			}
		},
		'order' : {
			'cn' : {
				'a' : '确认取消订单？'
			},
			'en' : {
				'a' : 'Are you sure you would like to cancel this order?'
			}
		},
		'refund' : {
			'cn' : {
				'a' : '确认退款？'
			},
			'en' : {
				'a' : 'Would you like to refund your order?'
			}
		},
		'chinesePage' : {
			'cn' : {
				'a' : '您好！SIE中文版报名系统将于15日内正式上线，<br/>谢谢您的支持，请耐心等待！',
				'b' : '返回英文界面'
			},
			'en' : {
				'a' : '您好！SIE中文版报名系统将于15日内正式上线，<br/>谢谢您的支持，请耐心等待！',
				'b' : '返回英文界面'
			}
		},
		'lab' : {
			'cn' : {
				'a' : '请选择一门实验课！'
			},
			'en' : {
				'a' : 'Please select a lab session!'
			}
		},
		'confirm' : {
			'cn' : {
				'a' : '确认！'
			},
			'en' : {
				'a' : 'confirm'
			}
		},
		'replaveMail' : {
			'cn' : {
				'a' : '关于候补课程开放注册的邮件通知'
			},
			'en' : {
				'a' : 'Receive email notifications once waitlisted courses become re-open'
			}
		},
		'replaveMsg' : {
			'cn' : {
				'a' : '候补课程说明',
				'b' : '在选择了“关于候补课程开放注册的邮件通知“选项之后， 您将会在候补课程开放给学生注册时收到邮件通知。 如果您之前的课程选择已满，您必须先退掉一门原先选择的课程才可以将候补课程新加入到您的课程选择当中。在候补课程重新开放之后，最先注册的学生将优先选课，直到课程满员关闭为止。'
			},
			'en' : {
				'a' : 'About Waitlist',
				'b' : 'Once you select “receive email notifications once waitlisted courses become re-open”, we will send you an email when a previously closed course on your waitlist becomes open for registration again. Please note that, to add new courses to your schedule ,you might have to drop one or several of your enrolled courses first. After a course becomes re-open, students are added to the course in the order that they register, until the courses reaches its full capacity. '
			}
		}
		
	},temp;
	function CNorEN(val){
		for(var i in options){
		if(val == i){
		if($('body').attr('class') == 'en_US'){
			temp = options[i].en;
		}else{
			temp = options[i].cn;
		}}}
		return temp;
	}
	return CNorEN(val);
};
vui.nsclick = function(str,arg){
	var log = new Image();
	log.onload = function(){
		document.body.appendChild(log);
		$(log).css({
			'display':'none'
		})
	}
	var args;
	if(arg){
		args = arg;
	}else{
		args = '';
	}
	log.src= str + args;
	
}
vui.summary = function(form,type,src){
	if($('input',$('#'+form)).length == 0) return;
	
	if(type){
		//console.log($('.summary .list').length);
		//return
		if($('.summary .list').length == 0){
			return
		}else{
			if(src){
				if(type == 'payhosting'){
					var len = $('.selist .ed').length;
					if(len == 0){
						return
					}
					bonus_id = $("#mdlusername").val();
					src +='bonus_id='+bonus_id+'&';
					src +='productIdsStr=';
					$('.selist .ed').each(function(i){
						if(i == 0){
							src += $(this).attr('name');
						}else{
							src += ',' + $(this).attr('name');
						}
						
					});
				}else{
					src = src;
				}
				$.ajax({
					type: "post",
					url: src,
					dataType : 'json',
					success:function(data) {
						if(data){
							if(data.status == 1){
								vui.message(data.message);
							}else{
								window.location.href = 'myorder.htm'
								//$('#'+form)[0].submit();
							}
						}else{
							alert("error!");
						}
					}
				});
			}
		}
	}else{
		$('#'+form)[0].submit();
	}
}
vui.radio = function(el,goid){
	if($(el).attr('checked')){
		if($(el).attr('value') != 'agree'){
			$('#'+goid).attr({
				'href' : 'login.htm'
			})
		}else{
			$('#'+goid).attr({
				'href' : 'register.htm'
			})
		}
	}
}
vui.regist = function(el){
	var input = el.parentNode.getElementsByTagName('input')[0];
	$('span',el.parentNode).attr({
		'style':'display:none'
	})
	setTimeout(function(){
		input.focus();
	},100);
}
vui.check = function(el,user){
	var success = true;
	function createMsg(els,msg){
		if($('#checkMsg').length > 0) return;
		var div = document.createElement('div');
		$(div).attr({
			'id' : 'checkMsg'
		});
		$('body').append(div);
		$(div).css({
			"left" : $(els).offset().left + 'px',
			"top" : ($(els).offset().top  - 21) + 'px'
		})
		
		 if(typeof $(els).attr('msg') != 'undefined'){
			 msg = $(els).attr('msg');
		 }
		$(div).html('<span>' + msg + '<span class="ad"></span></span>');
		els.focus();
	}
	function removeMsg(){
		$('#checkMsg').remove();
	}
	function len(els){
		var len = $(els).attr('len');
		if( typeof len == 'undefined'){
			return true
		}else{
			if($(els).attr('value').length < len){
				return true
			}else{
				return false
			}
		}
	}
	$('input',$('#'+el)).each(function(i){
		if($(this).attr('type') != 'hidden' && !$(this).hasClass('generateCode')){
			console.log(this)
			var lenes = len(this);
			if(!lenes){
				createMsg(this,'Beyond the limit,for a maximum of '+$(this).attr('len')+'.');
				success = false;
				return false;
			}
			if(user == 'user'){
				if(this.value == '' && this.name != 'ChineseName'){
					var temp = vui.isType.empty($(this).attr('value'),this,'sub');
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.id == 'telChina' || this.id == 'tel'){
					var temp = vui.isType.number($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.id == 'chineseName'){
					var temp = vui.isType.CN($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.id == 'GPA'){
					var temp = vui.isType.GPA($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
			}else{
				if(this.id == 'remitAccount'||this.id == 'remitNumber'){
					var temp = vui.isType.number($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.value.length > 250){
					var temp = vui.isType.empty($(this).attr('value'),this,'sub');
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.name == 'email'){
					var temp = vui.isType.mail($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.name == 'birth' || this.name == 'verification.transferTime'){
					var temp = vui.isType.data($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.name == 'passWord'){
					var temp = vui.isType.empty($(this).attr('value'),this);
					if(temp == false){
						success = false;
						return false;
					}
				}
				if(this.id == 'pw2'){
					var temp = vui.isType.submitCatch();
					if(temp == false){
						success = false;
						return false;
					}
				}
			}
		}
		
	})
	return success;
}
vui.isType = function(){
	var ergMail = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
	var ergNumber = /^[0-9]+([.]\d{1,2})?$/;
	var ergCN = /^[\u4e00-\u9fa5]+$/;
	var ergData = /^(\d{2})\/(\d{2})\/(\d{4})$/;
	function createMsg(el,msg){
		if($('#checkMsg').length > 0) return;
		var div = document.createElement('div');
		$(div).attr({
			'id' : 'checkMsg'
		});
		$('body').append(div);
		$(div).css({
			"left" : $(el).offset().left + 'px',
			"top" : ($(el).offset().top  - 21) + 'px'
		})
		
		 if(typeof $(el).attr('msg') != 'undefined'){
			 msg = $(el).attr('msg');
		 }
		$(div).html('<span>' + msg + '<span class="ad"></span></span>');
		el.focus();
	}
	function removeMsg(){
		$('#checkMsg').remove();
	}
	return {
		'mail' : function(strEmail,el){
			var match = strEmail.search(ergMail);
			if(match == -1){
				createMsg(el,'The username you entered is incorrect');
				return false;
			}else{
				removeMsg();
			}
		},
		'data' : function(strData,el){
			var match = strData.search(ergData);
			if(match == -1){
				createMsg(el,'Please fill in the correct date formats such as: mm/dd/yyyy.');
				el.focus();
				return false;
			}else{
				removeMsg();
			}
		},
		'matchPw' : function(el){
			if($('#pw1').attr('value') != $('#pw2').attr('value')){
				createMsg($('#pw1')[0],'The password you entered is incorrect');
				return false;
			}else if($('#pw1').attr('value') == ''){
				createMsg($('#pw1')[0],'The password you entered is incorrect');
				return false;
			}else{
				removeMsg();
				return true;
			}

		},
		'number' : function(str,el){
			var match = str.search(ergNumber);
			if(match == -1){
				createMsg(el,'Please fill in at least 1 digits');
				return false;
			}else{
				removeMsg();
			}
		},
		'submitCatch' : function(){
			return vui.isType.matchPw($('pw2')
					[0]);
		},
		'empty' : function(val,el,type){
			if(val.length == 0){
				if(type){
					createMsg(el,'The input can not be empty');
				}else{
					createMsg(el,'Password can not be empty');
				}
				return false;
			}else{
				removeMsg();
			}
		},
		'account' : function(val,el){
			val = $.trim(val);
			var number = val.search(ergNumber);
			if(number == -1 || val.length <= 1){
				createMsg(el,'you mast fill in 2 lengths');
				return false;
			}else{
				removeMsg();
			}
		},
		'GPA' : function(val,el){
			var _int = /^[0-9]*[1-9][0-9]*$/;
			var _print = /^\\d+(\\.\\d+)?$/;
			var temp;
			if(Number(val) > 0){
				if(Number(val) >= 5 || Number(val) <= 0 ){
					createMsg(el,'The No.should be between 0.0 to 5.0');
					return false;
				}else{
					if(val.search(_int) != -1){
						$(el).attr({
							'value' : val + '.0'
						})
					}else{
						$(el).attr({
							'value' : Math.round(val * 10) / 10
						})
					}
					removeMsg();
				}
			}else{
				createMsg(el,'The No.should be between 0.0 to 5.0');
				return false;
			}
		},
		'CN' : function(str,el){
			str = str.trim();
			var match = str.search(ergCN);		
			if(match == -1 && str != ''){
				createMsg(el,'Please fill in Chinese characters');
				return false;
			}else{
				removeMsg();
			}
		}
	}
}()
vui.correctPageHeight = function(ele){
	$(ele).css({
		'height':''
	})
	var bH = $(ele).height(),
		wH = $(window).height() - 45 -89,
		tH;
	tH = bH - wH > 0 ? 'none' : wH+'px';
	$(ele).css({
		'height':tH
	})
}

vui.message = function(strs,callback,autoStr,status){	
	/*
	 * strs 提示信息内容
	 * callback 点击确认按钮的回调函数
	 * autoStr 自定义结构传递的参数
	 * status 参数用于判断参数长度，用于点击后是否关闭
	 */
	var arg = arguments.length;
	var str = function(){
		var str = '<table style="width:100%;height:100%;"class="pop_dialog_table"><tbody><tr><td class="pop_topleft"></td><td class="pop_border"></td><td class="pop_topright"></td></tr><tr><td class="pop_border"></td><td class="pop_content">';
		str += '<div class="body"><div class="hd"><div class="closer"></div></div>';
		if(arg == 3){
			str += autoStr;
		}else{
			str += '<div class="bd">'+strs+'</div><div><span  style="margin-top:30px;float:none;" class="mit go">'+vui.ms('yes').a+'</span><span  style="margin-top:30px;float:none;margin-left:30px;" class="mit back">'+vui.ms('no').a+'</span></div>';
		}
		str += '</div></td><td class="pop_border"></td></tr><tr><td class="pop_bottomleft"></td><td class="pop_border"></td><td class="pop_bottomright"></td></tr></tbody></table>';
		return str;
	}();
	function closeMsg(){
		$('#cancelMsg').remove();
		$('.clearSie').remove();
	}
	
	vui.setClearWH('open',function(){
		var table = document.createElement('div');
		$(table).attr({'id':'cancelMsg'});
		$(table).html(str);
		$('.sie').append(table);
		$('#cancelMsg .closer,#cancelMsg .back').bind('click',function(){
			closeMsg();
		})
		$('#cancelMsg .go').bind('click',function(){
			if(callback){
				callback();
			}
			if(arg != 4){
				closeMsg();
			}
		})
	});
}
vui.autoMessage = function(options){	
	/*
	 * title,autoStr,callback,status
	 * strs 提示信息内容
	 * callback 点击确认按钮的回调函数
	 * autoStr 自定义结构传递的参数
	 * status 参数用于判断参数长度，用于点击后是否关闭
	 */
	var d = {
		title : false,
		autoStr : false,
		strs : false,
		callback : false,
		status : false,
		button : 2
	}
	for(var i in options){
		d[i] = options[i]
		
	}
	var str = function(){
		var str = '<table style="width:100%;height:100%;"class="pop_dialog_table"><tbody><tr><td class="pop_topleft"></td><td class="pop_border"></td><td class="pop_topright"></td></tr><tr><td class="pop_border"></td><td class="pop_content">';
		if(d.title){
			str += '<div class="body"><div class="hd"><h3>'+d.title+'</h3><div class="closer"></div></div>';
		}else{
			str += '<div class="body"><div class="hd"><div class="closer"></div></div>';
		}
		if(d.autoStr){
			str += d.autoStr;
		}else{
			if(d.button == 2){
				str += '<div class="bd">'+d.strs+'</div><div><span  style="margin-top:30px;float:none;" class="mit go">'+vui.ms('yes').a+'</span><span  style="margin-top:30px;float:none;margin-left:30px;" class="mit back">'+vui.ms('no').a+'</span></div>';
			}else{
				str += '<div class="bd">'+d.strs+'</div><div><span  style="margin-top:30px;float:none;" class="mit go">'+vui.ms('yes').a+'</span></div>';
			}
			
		}
		str += '</div></td><td class="pop_border"></td></tr><tr><td class="pop_bottomleft"></td><td class="pop_border"></td><td class="pop_bottomright"></td></tr></tbody></table>';
		return str;
	}();
	function closeMsg(){
		$('#cancelMsg').remove();
		$('.clearSie').remove();
	}
	
	vui.setClearWH('open',function(){
		var table = document.createElement('div');
		$(table).attr({'id':'cancelMsg'});
		$(table).html(str);
		$('.sie').append(table);
		$('#cancelMsg .closer,#cancelMsg .back').bind('click',function(){
			closeMsg();
		})
		$('#cancelMsg .go').bind('click',function(){
			if(options.callback){
				options.callback();
			}
			closeMsg();
		})
	});
}
vui.setClearWH = function(type,callback){
	if($('.sie .clearSie').length == 0){
		var clearSie = document.createElement('div');
		$(clearSie).attr({
			'class' : 'clearSie'
		});
		$('.sie').append(clearSie);
	}
	$('.sie .clearSie').css({
		'width' : $('.sie').width(),
		'top' : 0,
		'height' :  $('.page').height() + $('.pageFooter').height(),
		'display' : (type == 'open' ? 'block' : 'none')
	});
	if(callback){
		callback();
	}
}
vui.confirm = function(el,str){
	vui.message(str,function(){
		window.location.href = $(el).attr('href');
	});
	return false;
};
vui.payMoney = function(is){
	if($('.summary').length == 0) return;
	var payNumber = 0;
	var usdNumber = 0;
	var orderArray = [];
	var elem = $('.summary .subs .orderMessage .ll .selP .div');
	var elemPar = $('.summary .subs .orderMessage .ll .selP');
	var discount = $('.summary .subs .orderMessage .ll .selP .discount');
	var flag = false;
	function setNumber(num){
		var newNum = [],returnNum;
		//用于标识是否存在小数点，ture 存在 默认不存在
		var hasCoin = false;
		num = String(num);
		
		if(num.indexOf('.')!= -1){
			
			hasCoin = num.substring(num.indexOf('.'),num.length);
			num = num.substring(0,num.indexOf('.'));
		}
		num = num.split('');
		for(var i = num.length - 1; i>=0; i--){
			newNum.unshift(num[i]);
			if((num.length - i)%3 == 0 && i != 0){
				newNum.unshift(',');
			}
		}
		if(hasCoin){
			returnNum = newNum.join("") + hasCoin;
		}else{
			returnNum = newNum.join("") + '.00';
		}
		return returnNum
	} 
	function listerOnorLeaver(){
		if($(this).hasClass('defult')) return;
		if($(this).hasClass('ed')) return;
		if($(this).hasClass('on')){
			$(this).removeClass('on');
		}else{
			$(this).addClass('on');
		}
	}
	function addSelecter(){
		if($(this).parents('li').hasClass('defult')){
			return
		}
		if($(this).parents('li').hasClass('ed')){
			return
		}
		var el = $(this).parents('li');
		if(el.hasClass('on')){
			el.removeClass('on');
			el.addClass('ed');
		}
		if(is){
			var temp = el[0];
			var lister = $('.crouse',$(temp.parentNode));
			lister.each(function(){
				if(this != temp){
					$(this).addClass('defult');
				}
			})
		}
		var ele = {
			'num' : el.attr('num'),
			'usdNum' : el.attr('usdNum'),
			'expandPrice2' : el.attr('expandPrice2'),
			'expandUsdPrice2' : el.attr('expandUsdPrice2'),
			'name' : el.attr('name'),
			'obj' : el[0],
			'inner' : {
				'tit' : el.attr('tit'),
				'msgMain' : el.attr('msgTop'),
				'msgSub' : el.attr('msgDown')
			},
			'type' : el.attr('class')
		}
		setSelecter(ele);
		vui.correctPageHeight('.page');
	}
	function setSelecter(ele){
		var str = '<div class="l"><h3>'+ele.inner.tit+'</h3>';
		str += '<div>'+ele.inner.msgMain+'</div><div>';
		str += ele.inner.msgSub+'</div><span class="closer"></span></div>';
		str += '<input style="display:none;" name="productIds" value="'+ele.name+'" />'
		var createEle = function(){
			var ev = document.createElement('li');
			$(ev).attr({
				'class' : 'list',
				'num' : ele.num,
				'usdNum' : ele.usdNum,
				'expandPrice2' : ele.expandPrice2,
				'expandUsdPrice2' : ele.expandUsdPrice2,
				'name' : ele.name,
				'vel' : ele.type
			});
			$('.summary .mains .bd').append(ev);
			$(ev).html(str);
			
			orderArray.push(ele);
			payNumber = 0;
			$(orderArray).each(function(){
				payNumber = payNumber + Number(this.num);
				usdNumber = usdNumber + Number(this.usdNum);
			});
			//console.log(payNumber);
			$('#number').html(setNumber(payNumber));
			$('#number').attr({'money':payNumber});
			$('#usdNumber').html(setNumber(usdNumber));
			$('#usdNumber').attr({'usdMoney':usdNumber});
			$('#inputNumber').attr({
				'value' : payNumber
			});
			vui.correctPageHeight('.main');
			$('.sub').height($('.main').height());
			vui.correctPageHeight('.page');
			return ev
		}
		
		//return
		var ev = createEle();
		function returnSelecter(event){
			var _name = $(this).parents('li').attr('name');
			$('.selist li').each(function(){
				if($(this).attr('name') == _name){
					$(this).removeClass('ed');
					if(is){				
						var li = this;
						var ul = $('.crouse',$(li).parents('ul'));
						ul.each(function(){
							if(this != li){
								$(this).removeClass('defult');
							}
						})
					}
				}
			})

			var _this = this;
			var _num = $(_this).parents('li').attr('num');
			var _t;
			$(orderArray).each(function(){
				if(_num = this.num){
					_t = this;
				}
			});
			
			orderArray.splice($.inArray(_t,orderArray),1);
			
			
			if($('#number').attr('used') != 'ed'){
				
				payNumber = payNumber - _t.num;
				usdNumber = usdNumber - _t.usdNum;
				
			}else{
				payNumber = payNumber - _t.expandPrice2;
				usdNumber = usdNumber - _t.expandUsdPrice2;
			}
			
			
			$('#number').html(setNumber(payNumber));
			$('#number').attr({'money':payNumber});
			$('#usdNumber').html(setNumber(usdNumber));
			$('#usdNumber').attr({'usdMoney':usdNumber});
			$(this).parents('li').remove();
			if($('.course',$(this).parents('ul')).length == 0){
				$('#number').attr({'used' : ''})
				$('#inputOlderStu').attr({'value':'1'});
			}
		}
		$('.summary .subs').css({'display':'block'})
		$('.closer',ev).click(returnSelecter);
	}
	function setRadio(el){
		var temp;
		elem.each(function(){
			if($(this).hasClass('cur')){
				$(this).removeClass('cur');
			}
			if(this == el){
				$(this).addClass('cur');
				if($(this).attr('vec') == 'yes'){
					discount.css({'display':'block'});
					temp = true
				}else{
					discount.css({'display':'none'});
					temp = false
				}
			}
		});
		return temp;
	}
	function removeMsg(){
		$('#cancelMsg').remove();
		$('.clearSie').remove();
	}
	function getCourseType(){
		var ev = false;
		$('.summary .mains .list').each(function(){
			var tit = $(this).attr('vel');
			if(tit.indexOf('crouse') != -1){
				ev = {
					'ev' : this,
					'num' : Number($(this).attr('num')),
					'usdNum' : Number($(this).attr('usdnum')),
					'expandPrice2' : Number($(this).attr('expandPrice2')),
					'expandUsdPrice2' : Number($(this).attr('expandUsdPrice2'))
				}
			}
		});
		return ev;
	}
	function checkMdlusername(event){
		var target = event.target;
		if(target.id != 'btn_mdlusername') return;
		var ev = getCourseType();
		if(!ev){
			vui.message(vui.ms('discount').a);
		}else{
			var val = $('#mdlusername').attr('value').trim(),
				http = $(this).attr('vec'),
			 	json_data = {"email": val};
			    if(val == ""){
			    	return false;
			    }
			$.ajax({
				type: "post",
				url: http + "/checkDiscountMdl.action",
				data: json_data,
				success:function(data) {
					var dataObj = eval("("+data+")");
					if(dataObj){
						if(dataObj.message.length > 0){
							vui.message(dataObj.message);
						}
						if(dataObj.id == 1){
							if($('#number').attr('used') == 'ed'){
								return ;
							} 
							$('#number').attr({'used':'ed'});
							$('#inputOlderStu').attr({'value':'0'});
							
							payNumber = 0;
							usdNumber = 0;
							
							$(orderArray).each(function(){
								payNumber = payNumber + Number(this.expandPrice2);
								usdNumber = usdNumber + Number(this.expandUsdPrice2);
							})
							$('#number').html(setNumber(payNumber));
							$('#number').attr({'money':payNumber});
							$('#usdNumber').html(setNumber(usdNumber));
							$('#usdNumber').attr({'usdMoney':usdNumber});
							$('#inputNumber').attr({'value':payNumber});
						}
					}else{
						alert("error!");
					}
				}
			});
		}
	}
	$('.selist li').mouseenter(listerOnorLeaver);
	$('.selist li').mouseleave(listerOnorLeaver);
	$('.selist .sel').mousedown(addSelecter);
	elemPar.bind('click',function(event){
		var target = event.target;
		if(!$(target).hasClass('div')) return;
		var type = setRadio(target);
	});
	$('.discount').bind('click',checkMdlusername);
}

vui.msgChinesePage = function(){
	var str = '<div class="bd" style="line-height:26px;padding-top:20px;">'+vui.ms('chinesePage').a+'</div><div><span  style="margin-top:30px;float:none;" class="mit go">'+vui.ms('chinesePage').b+'</span></div>';
	vui.message(null,null,str);
}
vui.showList = function(){
	var courserHeight;
	$('.courser').toggle();
	if($('.courser').css('display') == 'block'){
		courserHeight = $('.courser').height();
	}else{
		courserHeight = 0;
	}
	$('.courseShowListerParent').height(courserHeight + $('.courseShowLister').height());
	vui.correctPageHeight('.sub');
	$('.main').height($('.sub').height());
	vui.correctPageHeight('.page');
}
window.onload = window.onresize = function(){
	vui.correctPageHeight('.page');
	if($('.isGetFocus').length > 0){
		$('.isGetFocus')[0].focus();
	}
}
})(window)
