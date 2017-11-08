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
        var __url__ = '/31462/index.php/Home/Index';
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
<div class="divCss" id="listPage" style="background: #f1f1f1">
    <?php if($_GET['type']): ?><div class="top" onclick="window.location.href='/31462/index.php/Home/Index/goods_list/type/<?php echo ($_GET["type"]); ?>/pageId/2'"><?php echo ($info["g_name"]); ?></div>
    <?php else: ?>
        <div class="top" onclick="window.location.href='/31462/index.php/Home/Index/index'"><?php echo ($info["g_name"]); ?></div><?php endif; ?>
    <div class="topBanner">
        <img src="<?php echo ($info["g_thum"]); ?>">
    </div>

    <div class="center2">
        <div class="centerBan1">
            <?php if($_GET["mark"] == 'free'): ?><span class="span1">0积分/张</span>
            <?php else: ?>
                <span class="span1"><?php echo ($info["g_price"]); ?>积分/张</span><?php endif; ?>
            <span class="span2"><?php echo ($info["g_desc"]); ?></span>
        </div>
        <div class="centerBan2">
            <span class="span3">有效期:    <?php echo ($info["g_term"]); ?></span>
            <?php if($_GET["mark"] == 'free'): ?><span class="span4">剩余<?php echo ($info["g_free"]); ?>张</span>
            <?php else: ?>
                <span class="span4">剩余<?php echo ($info["g_count"]); ?>张</span><?php endif; ?>
        </div>
        <div class="centerBan3">
            <?php if($_GET["mark"] == 'free'): ?><input class="numInput" type="hidden" value="1">
                <input id="mark" type="hidden" value="<?php echo ($_GET["mark"]); ?>">
            <?php else: ?>
                <input id="mark" type="hidden" value="0">
                <div class="num2">
                    兑换<input class="numInput" type="text" placeholder="请输入兑换数量">张
                </div><?php endif; ?>
            <div class="wz">您目前有<?php echo ($user["score"]); ?>积分,可以兑换<span><?php echo ($user["can"]); ?></span>张</div>
            <div class="exchange" data-id="<?php echo ($info["g_id"]); ?>"></div>
        </div>
    </div>
    <div class="center3">
        <div class="ruleTitle">
            使用规则
        </div>
        <div class="ruleBox">
            <?php echo ($info["g_info"]); ?>
        </div>
    </div>
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