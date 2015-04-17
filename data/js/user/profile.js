(function(vui){
	vui.Unvi = function(){
		var ele = {
			'country' : 0,
			'provs' : 0,
			'box' : null,
			'input' : null
		},
		country = ($('.page').attr('lan') == 'en_us')? allCountry.en : allCountry.cn,
		mainBox_lose  = '372px',
		mainBox_defult = '426px';
		function setHeight(type){
			if(type == 'defult'){
				$('#schoolSelectBox').css({'height':mainBox_defult});
			}else{
				$('#schoolSelectBox').css({'height':mainBox_lose});
			}
		}
		function createSeler(backer,type){
			var schoolHTML = '<table style="width: 100%; height: 100%; "class="pop_dialog_table">';
			    schoolHTML += '<tbody><tr><td class="pop_topleft"></td><td class="pop_border"></td><td class="pop_topright"></td></tr><tr><td class="pop_border"></td>';
				schoolHTML += '<td class="pop_content"><h2><span>';
				if(type == 'school'){
					schoolHTML += 'Choose your university';
				}else{
					schoolHTML += 'Choose Your Country';
				}
				schoolHTML += '</span><a style="display:none;"class="close-button"href="#nogo"onclick="return false;">Close</a></h2><div class="dialog_content"><div class="dialog_body"><div id="univlist"style="position: static;"><div>';
				if(type == 'school'){
					schoolHTML += '<ul id="popup-country"></ul>';
					schoolHTML += '<ul id="popup-province"></ul>';
					schoolHTML += '<ul id="popup-unis"></ul>';
					schoolHTML += '<div id="popup-other"><div class="ohterTop"><span>University Name:</span><input id="univOtherVal" name="unvi" value="" /></div><div class="ohterBottom">If you can’t find your university in the list, you can fill it  in the blank.</div></div>';
				}else{
					schoolHTML += '<ul id="popup-unis"></ul>';
				}
				schoolHTML += '</div></div></div><div class="dialog_buttons"><input onclick="vui.Unvi.remove();" type="button"class=" input-submit" value="Close"dialog="1"/></div></div>';
				schoolHTML += '</td><td class="pop_border"></td></tr><tr><td class="pop_bottomleft"></td><td class="pop_border"></td><td class="pop_bottomright"></td></tr></tbody></table>';
			var schoolEle = document.createElement('div');
			if(type == 'school'){
				$(schoolEle).attr({
					'id':'schoolSelectBox',
					'class':'seleBox'
				});
			}else{
				$(schoolEle).attr({
					'id':'countrySelectBox',
					'class':'seleBox'
				});
			}
			vui.setClearWH('open',function(){
				document.body.appendChild(schoolEle);
				$(schoolEle).html(schoolHTML);
				backer();
			});
			
		}
		function createHTML(a,b,type,d){
			var str = "";
			var li = document.createElement('li');
			if(b == 0){
				if(type != 'popup-unis'){
					$(li).attr({
						'class' : 'active'
					})
				}
			}
			$(li).attr({
				'id' : 'c_' + b
			})
			if(type == 'popup-country'){
				str += '<a href="javascript:void(0);" onclick="vui.Unvi.country('+b+',\'c_'+b+'\')">'+a+'</a>';
				$(li).attr({
					'id' : 'c_' + b
				})
			}else if(type == 'popup-province'){
				str += '<a href="javascript:void(0);" onclick="vui.Unvi.provs('+d+','+b+',\'p_'+b+'\')">'+a+'</a>';
				$(li).attr({
					'id' : 'p_' + b
				})
			}else{
				if($('#countrySelectBox').length == 0){
					str += '<a href="javascript:void(0);" onclick="vui.Unvi.school(\'s_'+b+'\',\'school\')">'+a+'</a>';
				}else{
					if(ele.input.className == 'country'){
						str += '<a href="javascript:void(0);" onclick="vui.Unvi.school(\'s_'+b+'\',\'country\')">'+a+'</a>';
					}else{
						str += '<a href="javascript:void(0);" onclick="vui.Unvi.school(\'s_'+b+'\',\'citizentship\')">'+a+'</a>';
					}
					
				}
				$(li).attr({
					'id' : 's_' + b
				})
			}
			$('#'+type).append(li);
			$(li).html(str);
		}

		function setCountry(num){
			if($(num).attr('class') == 'school'){
				$(allUnivList).each(function(i){
					createHTML(this.name,i,'popup-country');
				})
				var others = document.createElement("li");
				$(others).attr({'id':'c_other'});
				$(others).html('<a href="javascript:void(0)" onclick="vui.Unvi.other(\'c_other\')">other<a/>');
				$('#popup-country').append(others);
			}else{
				$(country).each(function(i){
					createHTML(this,i,'popup-unis');
				})
			}
		}
		function setProvs(num){
			$('#popup-province').html('');
			if(allUnivList[num].provs.length == 0){
				$('#popup-province').css({'display':'none'});
				setHeight();
			}else{
				$(allUnivList[num].provs).each(function(i){
					createHTML(this.name,i,'popup-province',num);
				})
				$('#popup-province').css({'display':'block'});
				setHeight('defult');
			}
			
		}
		function setSchool(num,cur){
			$('#popup-unis').html('');
			if(allUnivList[num].provs){
				$(allUnivList[num].provs[cur].univs).each(function(i){
					createHTML(this.name,i,'popup-unis');
				})
			}else{
				$(allUnivList[num].univs).each(function(i){
					createHTML(this.name,i,'popup-unis');
				})
			}
		}
		function newStatus(o,ev){
			if(!ev) return;
			$('.active',$('#'+o)).removeClass('active');
			$('#'+ev).attr({
				'class' : 'active'
			})
		}
		var isIng = {
			'main' : function(){
				$('#popup-province').css({'display':'block'});
				$('#popup-unis').css({'display':'block'});
				$('#popup-other').css({'display':'none'});
			},
			'sub' : function(){
				$('#popup-province').css({'display':'none'});
				$('#popup-unis').css({'display':'none'});
				$('#popup-other').css({'display':'block'});
			},
			'main_lose' : function(){
				$('#popup-province').css({'display':'none'});
				$('#popup-unis').css({'display':'block'});
				$('#popup-other').css({'display':'none'});
			}
		}
		return {
			'country' : function(num,el){
				isIng.main();
				this.provs(num);
				newStatus('popup-country',el);
			},
			'provs' : function(num,cur,el){
				if(!cur){ cur = 0};
				setProvs(num);
				setSchool(num,cur);
				if(el){
					newStatus('popup-province',el);
				}
			},
			'school' : function(el,type){
				$('.' + type).attr({
					'value':$('a',$('#'+el)).html()
				})
				if(ele.box){
					vui.Unvi.remove();
				}
				$(type).focus();
				if(type == 'citizentship'){
					var _country = $('.'+type).val();
					if(_country != 'China' && _country != '中国, 中华'){
						$('.getCode').show();
					}else{
						$('.getCode').hide();
					}
				}
			},
			'remove' : function(){
				if($('#c_other').hasClass('active')){
					$(ele.input).attr({'value':$('#univOtherVal').attr('value')});
				}
				ele.input.blur();
				$('.seleBox').remove();
				vui.setClearWH('close');
			},
			'init' : function(el,obj){
				obj.blur();
				if(!document.getElementById(el)){
					ele.box = el;
					ele.input = obj;
					createSeler(function(){
						setCountry(obj);
						vui.Unvi.provs(0,0);
					},'school')
				}else{
					document.getElementById(el).style.display = 'block';
				}
			},
			'selCounInit' : function(el,obj){
				obj.blur();
				if(!document.getElementById(el)){
					ele.box = el;
					ele.input = obj;
					createSeler(function(){
						setCountry(obj);
					},'country')
				}else{
					document.getElementById(el).style.display = 'block';
				}
			},
			'other' : function(el){
				newStatus('popup-country',el);
				isIng.sub();
			},getCode : function(){
				$.get('generateCode.action',
					function(data,status){
					if(status == 'success'){
						var str = '<div style="line-height:30px;padding:30px;text-align:left;">';
						str += 'Please give this code to the other students in your application group.” (Appears with the code generated for students)Your code is <b style="color:red;">'+data+'</b>, this code will be sent to your email box.';
						str += '</div>'
						vui.message(true,true,str);
					}
				});
			}
		}
	}();
})(vui)