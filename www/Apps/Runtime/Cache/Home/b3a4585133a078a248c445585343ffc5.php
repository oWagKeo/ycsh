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
<style type="text/css" >
    input:-ms-input-placeholder{
        font-size: 0.36rem;
        color: #999999;
    }
    input::-webkit-input-placeholder{
        font-size: 0.36rem;
        color: #999999;
    }
</style>
<div class="divCss" id="listPage">
    <?php if($_GET['type'] == 'free'): ?><div class="top_no">
    <?php else: ?>
        <div class="top" onclick="window.location.href='/31462/index.php/Home/Index/index'"><?php endif; ?>
    <?php if($mark == 'list'): if($_GET['type'] == 'free'): ?>派发
        <?php else: ?>
            <?php echo ($nav[$_GET['type']-1]); endif; ?>
    <?php else: ?>
        搜索结果<?php endif; ?>
    </div>
    <div class="list" data-type="<?php echo ($_GET["type"]); ?>">
        <ul class="ul1">
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <a href="/31462/index.php/Home/Index/info/type/<?php echo ($_GET['type']); ?>/gid/<?php echo ($vo["g_id"]); ?>/mark/<?php echo ($_GET["type"]); ?>" style="display: block">
                    <div class="imgBox">
                        <img src="<?php echo ($vo["g_thum"]); ?>">
                    </div>
                    <div class="right">
                        <div class="title"><?php echo ($vo["g_name"]); ?></div>
                        <div class="xq"><?php echo ($vo["g_desc"]); ?></div>
                        <?php if($_GET["type"] != 'free'): ?><div class="num">剩余<?php echo ($vo["g_count"]); ?>张</div>
                            <div class="score"><span><?php echo ($vo["g_price"]); ?></span>积分</div>
                        <?php else: ?>
                            <div class="num">剩余<?php echo ($vo["g_free"]); ?>张</div>
                            <div class="score"><span>0</span>积分</div><?php endif; ?>
                    </div>
                        <div class="right2">
                            <div class="more gotBtn">领取</div>
                        </div>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="footer">
    <ul>
        <li class="li1 on">
            <a href="/31462/index.php/Home/Index/index/pageId/1">  <img src="/31462/Public/img/f_01.jpg" class="img1"><img src="/31462/Public/img/f1_01.jpg" class="img2"></a>
        </li>
        <li class="li2">
            <a href="/31462/index.php/Home/Index/goods_list/type/free/pageId/2/mark/free">  <img src="/31462/Public/img/f_02.jpg" class="img1"><img src="/31462/Public/img/f1_02.jpg" class="img2"></a>
        </li>
        <li class="li3">
            <a href="/31462/index.php/Home/Index/award/pageId/4">  <img src="/31462/Public/img/f_03.jpg" class="img1"><img src="/31462/Public/img/f1_03.jpg" class="img2"></a>
        </li>
        <li class="li4">
            <a href="/31462/index.php/Home/User/user/pageId/3/type/1">  <img src="/31462/Public/img/f_04.jpg" class="img1"><img src="/31462/Public/img/f1_04.jpg" class="img2"></a>
        </li>
    </ul>
</div>

<script type="text/javascript">
    
    var pageId="<?php echo ($_GET["pageId"]); ?>";

</script>


</div>

<div class="zhezhao divcss">
    <div class="whichCard">
        <div class="w_closeBox">
            <div class="w_close"></div>
        </div>
        <div class="w_nr">

            <div class="w_title">领奖电话号码</div>
           <input type="text" class="w_phone" placeholder="请输入您的领奖电话号码">
            <div class="w_sureBtn">确认</div>
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