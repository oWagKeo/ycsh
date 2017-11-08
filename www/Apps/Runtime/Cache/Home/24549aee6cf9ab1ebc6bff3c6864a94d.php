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
        var __url__ = '/31461/index.php/Home/Index';
        var __img__ = '/31461/Public/img';
        var __js__ = '/31461/Public/js';
        var __css__ = '/31461/Public/css';
        var __module__ = '/31461/index.php/Home';
    </script>
    <script src="/31461/Public/js/jquery.js"></script>
    <script src="/31461/Public/js/SuperSlide.js"></script>
    <link href="/31461/Public/css/style.css?v1.12" rel="stylesheet">
    <link href="/31461/Public/css/index.css" rel="stylesheet">
</head>
<body>
<script src="/31461/Public/js/TouchSlide.1.1.js"></script>
<div class="tipsPage">
    <div id="slideBox2" class="slideBox2">
        <div class="hd2">
            <ul></ul>
        </div>
        <div class="bd2">
            <ul>
                <li><img src="/31461/Public/img/tips.jpg"></li>
                <li><img src="/31461/Public/img/tips.jpg"></li>
                <li style="position: relative"><img src="/31461/Public/img/tips.jpg">
                <div class="toIndex">进入首页</div>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        /* jQuery("#slideBox2").slide({ titCell:".hd2 ul",mainCell:".bd2 ul",interTime:3000,effect:"left",autoPlay:true,autoPage:true});*/
        TouchSlide({
            slideCell:"#slideBox2",
            titCell:".hd2 ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
            mainCell:".bd2 ul",
            interTime:3000,
            effect:"left",
            autoPlay:false,//自动播放
            autoPage:true //自动分页
            /*switchLoad:"src" //切换加载，真实图片路径为"_src"*/
        });
    </script>
</div>

<script type="text/javascript">
    $(".toIndex").click(function(){
        window.location.href="/31461/index.php/Home/Index/index"
    });
</script>

<!--弹窗-->
<div id="container" style="display: none !important;"></div>
<div id="alert">
    <div id="alertinfo">
        <div id="contentpage"></div>
        <div id="buttonpage"><div id="sureBtn" onclick="closeAlert()">确定</div></div>
    </div>
</div>
</body>
<script src="/31461/Public/js/Tool.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    <?php echo ($wx_config); ?>


    var shareData={
        link:"http://wx91660942fa7be4c2.wx1.cdh5.cn/31461/index.php",
        desc:"为您度身定制的线上刚性礼券供应&兑换平台，各种优惠劵、大礼包等你领哦",
        imgUrl:"http://wx91660942fa7be4c2.wx1.cdh5.cn/"+"/31461/Public/img/logo.png?v1.3",
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
<script src="/31461/Public/js/gameE_min.js"></script>
<script src="/31461/Public/js/Game.js"></script>

</html>