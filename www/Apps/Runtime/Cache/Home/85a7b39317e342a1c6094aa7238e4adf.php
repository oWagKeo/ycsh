<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0"  />
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-page-mode" content="portrait">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="320">
    <title>邮储电子银行—场景宝</title>
    <script>
        var __url__ = '/31462/index.php/Home/Logreg';
        var __img__ = '/31462/Public/img';
        var __js__ = '/31462/Public/js';
        var __css__ = '/31462/Public/css';
        var __module__ = '/31462/index.php/Home';
    </script>
    <script src="/31462/Public/js/jquery.js"></script>
    <script src="/31462/Public/js/SuperSlide.js"></script>
    <link href="/31462/Public/css/style.css?v1.12" rel="stylesheet">
    <link href="/31462/Public/css/index.css" rel="stylesheet">
</head>
<body>
<style type="text/css" >
    input:-ms-input-placeholder{
        color: #fff;
    }
    input::-webkit-input-placeholder{
        color: #fff;
    }
</style>
<div class="divCss" id="loginPage" >
    <img src="/31462/Public/img/login.jpg" style="width: 100%">
    <input class="cardNum1" type="text" placeholder="请输入银行卡号">
    <input class="cardNum2" type="text" placeholder="再次输入银行卡号">
    <input class="name" type="text" placeholder="姓名">
    <input class="phone" type="text" placeholder="输入手机号">
    <div class="getCode">获取验证码</div>
    <input class="code" type="text" placeholder="输入验证码">
    <ul class="isDown">
        <li class="isDownLi1"></li>
        <li class="isDownLi2"></li>
    </ul>
    <div class="loginBtn"></div>
</div>


<!--弹窗-->
<div id="container" style="display: none !important;"></div>
<div id="alert">
    <div id="alertinfo">
        <div id="contentpage"></div>
        <div id="buttonpage"><div id="sureBtn" onclick="closeAlert()">确定</div></div>
    </div>
</div>
</body>
<script src="/31462/Public/js/Tool.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    <?php echo ($wx_config); ?>


    var shareData={
        link:"http://wx91660942fa7be4c2.wx1.cdh5.cn/3146/index.php",
        desc:"为您度身定制的线上刚性礼券供应&兑换平台，各种优惠劵、大礼包等你领哦",
        imgUrl:"http://wx91660942fa7be4c2.wx1.cdh5.cn/"+"/31462/Public/img/logo.png?v1.3",
        title:"邮储电子银行—场景宝"
    };
</script>
<script>
    (function() {
        if (typeof WeixinJSBridge == "object" && typeof WeixinJSBridge.invoke == "function") {
            handleFontSize();
        } else {
            if (document.addEventListener) {
                document.addEventListener("WeixinJSBridgeReady", handleFontSize, false);
            } else if (document.attachEvent) {
                document.attachEvent("WeixinJSBridgeReady", handleFontSize);
                document.attachEvent("onWeixinJSBridgeReady", handleFontSize);  }
        }
        function handleFontSize() {
            // 设置网页字体为默认大小
            WeixinJSBridge.invoke('setFontSizeCallback', { 'fontSize' : 0 });
            // 重写设置网页字体大小的事件
            WeixinJSBridge.on('menu:setfont', function() {
                WeixinJSBridge.invoke('setFontSizeCallback', { 'fontSize' : 0 });
            });
        }
    })();


</script>
<script src="/31462/Public/js/gameE_min.js"></script>
<script src="/31462/Public/js/Game.js"></script>

</html>