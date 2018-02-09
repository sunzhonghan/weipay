<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<link rel="stylesheet" href="css/new_file.css" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js" ></script>
		<script type="text/javascript" src="js/new_file.js" ></script>
		<link rel="stylesheet" href="layer/mobile/need/layer.css" />
		<script type="text/javascript" src="layer/mobile/layer.js" ></script>
		<title>乐承娱乐充值</title>
	</head>
	<body>
		<!--头部  star-->
		<header>
			<a href="javascript:history.go(-1);">
				<div class="_left"><img src="images/Arrow_left_icon.png"></div>
				乐承充值系统
			</a>
		</header>
		<!--头部 end-->
		<div class="banner">
			<img src="images/banner.png" width="100%" height="100%"/>
		</div>
		<!--充值列表-->
		<div class="person_wallet_recharge">
			<ul class="ul">
                <li>
                    <h2>￥10</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                    <h2>￥20</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                    <h2>￥50</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                    <h2>￥100</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                    <h2>￥200</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                    <h2>￥500</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                   <h2>￥1000</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
                   <h2>￥2000</h2>
                    <div class="sel" style=""></div>
                </li>
                <li>
					<h2>￥3000</h2>
                    <div class="sel" style=""></div>
                </li>
                <div style="clear: both;"></div>
            </ul>
            <div class="pic">自定义金额：<input type="text" placeholder="金额必须为100元以上" id="txt" /></div>
            <div class="botton">立即充值</div><br/>
            <div class="agreement"><p>点击立即充值，即您已经表示同意<a>《充值活动协议》</a></p></div>
            <div class="nav">
            	
            </div>
            <!--遮罩层-->
            <div class="f-overlay"></div>
            <div class="addvideo" style="display: none;">
            	<h3 id="allText">本次充值<span id="realValue" value="100"></span>元</h3>
	            <ul>
	            	<li><a id="weXinPay">微信支付</a></li>
	            	<li><a>支付宝支付</a></li>
	            	<li class="cal" id="cal">取消</li>
	            </ul> 
            </div>
		</div>
	</body>
</html>
