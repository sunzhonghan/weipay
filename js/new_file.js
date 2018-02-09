$(function(){
	var a=100;
	var b=100;
	var isDiy= "非自定义";
	var allowValue = ['10','20','50','100','200','500','1000','2000','3000'];
	
	$(".person_wallet_recharge .ul li").click(function(e){
		$(this).addClass("current").siblings("li").removeClass("current");
		$(this).children(".sel").show(0).parent().siblings().children(".sel").hide(0);
		b = $(".current").children("h2:eq(0)").text();
		
	});
	
	$(".botton").click(function(e){
		var txt = $("#txt").val();
		b = $(".current").children("h2:eq(0)").text();
		if(!$(".person_wallet_recharge .ul li").hasClass('current') && txt ==''){			
		layer.open({
            content: '请输入或选择金额',
            style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
            time:3
           });
           return false;
		}	
		
		
		if(!$(".person_wallet_recharge .ul li").hasClass('current')){	
			
			if(isNaN(txt)){
				layer.open({
	            content: '非法操作！Error:0',
	            style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
	            time:3
	           });
	           return false;
			} 
			
			
			if( txt < a){
				layer.open({
	            content: '金额必须是100元以上!Error:1',
	            style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
	            time:3
	           });
	           return false;
			} 
			
			//这里是控制个人充值的 判断是哪一的值
			$("#txt").val();
		
			$(".f-overlay").fadeIn();
			$("#realValue").text($("#txt").val())
			$(".addvideo").fadeIn();
			isDiy = "自定义";
			return false;
		}
		else
		{
			b = (b.slice(1));
			//alert(b)
		//这里用来控制选择的金额
		//$("#txt").val();
			if(isNaN(b))
			{
				layer.open({
					content: '非法操作！系统充值不容改变！Error:3',
					style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
					time:3
				   });
				   return false;
			}
		
			
			//alert(allowValue.indexOf(b)); 
			if(allowValue.indexOf(b) > -1)
			{
				//$(".f-overlay").show();
				$("#realValue").text(b)
				//$(".addvideo").show();
				$(".f-overlay").fadeIn();
				$(".addvideo").fadeIn();
				isDiy = "非自定义";
				return false;
			}
			else
			{
				layer.open({
					content: '非法操作！系统充值不容改变！Error:4',
					style: 'background:rgba(0,0,0,0.6); color:#fff; border:none;',
					time:3
				   });
				   return false;
			}
			
		}
		
		
		
		
	})
	$("#weXinPay").click(function(e){
		
		value = $("#realValue").text();
		userId= "";//获取OpenId
		
		
		//alert(value)
		$.post("h5/demo/pay.php",{realValue:value,openid:'1998','isDiy':isDiy,'allowList':allowValue},function(result){
			alert(result);
			result = eval("(" + result + ")");
			code = result['resultCode'];
			textContent = result['Text'];
			//alert(result['Text']);
			//alert(result['Text']);
			if(code == 0){
				$("#allText").text(textContent);
			}else if(code == 1){
				$("#allText").text(textContent);
			}
			
			
		});
		
	})
	
	$("#cal").click(function(e){
		//$(".f-overlay").hide();
		//$(".addvideo").hide();
		$(".f-overlay").fadeOut();
		$(".addvideo").fadeOut();
		
		
		return false;
	
		
	})
	
	
});
