(function(vui){
vui.goMsgBox = function(oldEv,newEv,args){
	function policy(ev){
		var target = ev.target,parent;
		if(target.className == 'sel'){
			$('.policy .submit input').each(function(){
				if($(this).attr('checked') && $(this).attr('value') == 'agree'){
					vui.goMsgBox('policy','register');
					$('.register .mit').attr({'class':'mit'});
					$('.register .forgot').attr({'onmousedown':'','class':''});
				}else{
					vui.goMsgBox('policy','register');
				}
			})
		}
	}
	$('.'+oldEv).css({'display':'none'});
	$('.'+newEv).css({'display':'block'});
	window.location.hash = newEv;
	if(args){
		$('.'+newEv).bind('click',policy);
	}
	
}
vui.textarea = function(){
	if($('.po_slider .btn').length == 0){
		return 
	}
	
	var ele = $('.po_slider .btn');
	var inner = $('.po_inner');
	
	var innerH = inner.height();
	var dd = innerH / 220;
	var elesTop = ele.offset().top;
	var mouseAdd;
	var defult;
	var mover = function(e){
		if(!mouseAdd){
			mouseAdd = e.pageY;
		}
		var moPx = e.pageY - mouseAdd;
		if(moPx >= 0 && moPx <= 220){
			ele.css({
				'top' :e.pageY - mouseAdd + 'px'
			})
			inner.css({
				'top': (0 - dd * moPx) + 'px'
			})
		}
	}
	var createMover = function(){
		$(document).bind('mousemove',mover);
		$(document).bind('mouseup',function(){
			$(document).unbind('mousemove',mover);
		});
	}
	ele.bind('mousedown',createMover);
	
	
	
};
var checkLoginBoxMeg = function(){
	var flag;
	return {
		init : function(){
			if(flag && flag.ev == this) return;
			var _input = this.getElementsByTagName('input')[0];
			var _span = this.getElementsByTagName('span')[0];
			$(_span).css({'display':'none'});
			$(_input).focus();
			if(flag){
				var flagVal = $(flag.input).attr('value');
				if(flagVal.length == 0){
					$(flag.span).css({'display':'block'})
				}
			}
			flag = {
				'ev' : this,
				'input' : _input,
				'span' : _span
			}
		}
	}
}();
$(document).ready(function(){
	vui.textarea();
});
})(vui)