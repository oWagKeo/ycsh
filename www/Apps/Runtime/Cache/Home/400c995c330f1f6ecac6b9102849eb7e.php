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
        var __url__ = '/index.php/Home/Index';
        var __img__ = '/Public/img';
        var __js__ = '/Public/js';
        var __css__ = '/Public/css';
        var __module__ = '/index.php/Home';
    </script>
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/SuperSlide.js"></script>
    <link href="/Public/css/style.css?v1.12" rel="stylesheet">
    <link href="/Public/css/index.css" rel="stylesheet">
</head>
<body>
<div class="divCss" id="indexPage">
    <div class="banner">
        <img src="/Public/img/banner.jpg?v1.12">
        <div class="searchBox">
            <input class="searchName" type="text">
            <div class="searchBtn"></div>
        </div>
        <div class="phoneBill" onclick="window.location.href='/index.php/Home/Index/goods_list/type/1'">  </div>
        <div class="flow" onclick="window.location.href='/index.php/Home/Index/goods_list/type/2'">  </div>
        <div class="video" onclick="window.location.href='/index.php/Home/Index/goods_list/type/3'">  </div>
        <div class="novel" onclick="window.location.href='/index.php/Home/Index/goods_list/type/4'">  </div>
        <div class="game" onclick="window.location.href='/index.php/Home/Index/goods_list/type/5'">  </div>
        <div class="shopping" onclick="window.location.href='/index.php/Home/Index/goods_list/type/6'">  </div>
        <div class="outing" onclick="window.location.href='/index.php/Home/Index/goods_list/type/7'">  </div>
        <div class="familyWork" onclick="window.location.href='/index.php/Home/Index/goods_list/type/8'">  </div>
        <div class="movie" onclick="window.location.href='/index.php/Home/Index/goods_list/type/9'">  </div>
        <div class="soldOut" onclick="window.location.href='/index.php/Home/Index/goods_list/type/10'">  </div>
        <div class="seeding" onclick="window.location.href='/index.php/Home/Index/goods_list/type/11'">  </div>
    </div>

    <div class="slide">
        <img class="titleImg" src="/Public/img/title.png?v1.12">
        <div class="slideBox">
            <div class="hd">
<ul>
    <li></li><li></li>
</ul>
            </div>
            <div class="bd">
                <ul class="ul1">
                    <li>
                        <img src="/Public/img/1_03.jpg?v1.1">
                        <div class="title2"></div>
                    </li>
                    <li>
                        <img src="/Public/img/1_05.jpg?v1.1">
                        <div class="title2"></div>
                    </li>
                    <li>
                        <img src="/Public/img/1_07.jpg?v1.1">
                        <div class="title2"></div>
                    </li>

                    <li>
                        <img src="/Public/img/2_03.jpg">
                        <div class="title2"></div>
                    </li>
                    <li>
                    <img src="/Public/img/2_05.jpg" onclick="window.location.href='http://wx.cdh5.cn/3150/'">
                    <div class="title2"></div>
                </li>
                    <li>
                        <img src="/Public/img/2_07.jpg">
                        <div class="title2"></div>
                    </li>
                </ul>

            </div>
        </div>
        <script type="text/javascript"> jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:3,scroll:3});</script>

    </div>


    <div class="list" data-type="0">
        <ul class="ul1">
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                    <a href="/index.php/Home/Index/info/gid/<?php echo ($vo["g_id"]); ?>" style="display: block">
                    <div class="imgBox">
                        <img src="<?php echo ($vo["g_thum"]); ?>">
                    </div>
                    <div class="right">
                        <div class="title"><?php echo ($vo["g_name"]); ?></div>
                        <div class="xq"><?php echo ($vo["g_desc"]); ?></div>
                        <div class="num">剩余<?php echo ($vo["g_count"]); ?>张</div>
                        <div class="score"><span><?php echo ($vo["g_price"]); ?></span>积分</div>
                    </div>
                    <div class="right2">
                        <a href="" class="sold">购买</a>
                        <a href="/index.php/Home/Index/info/gid/<?php echo ($vo["g_id"]); ?>" class="more" style="font-size: 0.2rem">积分兑换</a>
                    </div>
                    </a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>





    <div class="footer">
    <ul>
        <li class="li1 on">
            <a href="/index.php/Home/Index/index/pageId/1">  <img src="/Public/img/f_01.jpg" class="img1"><img src="/Public/img/f1_01.jpg" class="img2"></a>
        </li>
        <li class="li2">
            <a href="/index.php/Home/Index/goods_list/type/free/pageId/2/mark/free">  <img src="/Public/img/f_02.jpg" class="img1"><img src="/Public/img/f1_02.jpg" class="img2"></a>
        </li>
        <li class="li3">
            <a href="/index.php/Home/Index/award/pageId/4">  <img src="/Public/img/f_03.jpg" class="img1"><img src="/Public/img/f1_03.jpg" class="img2"></a>
        </li>
        <li class="li4">
            <a href="/index.php/Home/User/user/pageId/3/type/1">  <img src="/Public/img/f_04.jpg" class="img1"><img src="/Public/img/f1_04.jpg" class="img2"></a>
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

            <div class="w_title">选择支付方式</div>
            <ul class="w_ul">
                <li>借记卡</li>
                <li>信用卡</li>
                <li>优友宝</li>
            </ul>
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
<script src="/Public/js/Tool.js"></script>

<script>
    (function() {
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
<script src="/Public/js/gameE_min.js"></script>
<script src="/Public/js/Game.js?v1.12"></script>

</html>