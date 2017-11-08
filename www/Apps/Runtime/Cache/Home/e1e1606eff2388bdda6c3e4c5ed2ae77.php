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
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width,initial-scale=1.0,user-scalable=no'>
    <title>邮储银行</title>
    <link rel="stylesheet" href="/Public/css/index.css">
    <link rel="stylesheet" href="/Public/css/style.css">
    <style>

        #loadOut{position: absolute;border-radius: 5px;overflow: hidden;background-color: #faefb7;height: 10px;width: 240px;top: 80%;left: 50%;display: none}
        #loadIn{width: 0%;;border-radius: 5px;background-color: #edd07e;height: 100%}
        .divClass{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            display: none;
        }
        #container{
            display: none !important;
        }

    </style>
</head>
<body scroll='no' style="overflow: hidden" onload='init();'>

<div id="container2">

    <div id="loadPage">
        <div id="loadOut">
            <div id="loadIn">

            </div>
        </div>
    </div>
    <!--canvas-->
    <canvas id="canvas" width="750px" height="1205px"></canvas>
    <div class="awardTime">你还有<span><?php echo ($user["u_lottery"]); ?></span>次游戏机会</div>

    <div class="alertWindow">
        <div class="alertContent">
            <div class="alertTitle">很遗憾</div>
            <div class="alertNr"><div class="nr">您可能是抽了假奖！</div> </div>
            <div class="alertClose"></div>
            <img class="button" src="/Public/img/button.png" onclick="window.location.href='/index.php/Home/User/user/pageId/3/type/3'">
        </div>

    </div>







    <!-----------------------------华丽的分割线------------------------------------>
    <div class="footer">
        <ul>
            <li class="li1 on">
                <a href="/index.php/Home/Index/index/pageId/1">  <img src="/Public/img/f_01.jpg" class="img1"><img src="/Public/img/f1_01.jpg" class="img2"></a>
            </li>
            <li class="li2">
                <a href="/index.php/Home/Index/goods_list/type/free/pageId/2">  <img src="/Public/img/f_02.jpg" class="img1"><img src="/Public/img/f1_02.jpg" class="img2"></a>
            </li>
            <li class="li3">
                <a href="/index.php/Home/Index/award/pageId/4">  <img src="/Public/img/f_03.jpg" class="img1"><img src="/Public/img/f1_03.jpg" class="img2"></a>
            </li>
            <li class="li4">
                <a href="/index.php/Home/User/user/pageId/3">  <img src="/Public/img/f_04.jpg" class="img1"><img src="/Public/img/f1_04.jpg" class="img2"></a>
            </li>
        </ul>
    </div>

    <script type="text/javascript">

        var pageId="<?php echo ($_GET["pageId"]); ?>";

    </script>


</div>
<div id="container" style="display: none"></div>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Gamea.js"></script>
<script src="/Public/js/LC_LoaderBar_class.min.js"></script>
<script src="/Public/js/Tool.js"></script>
<script type="text/javascript">
    var __img__ = '/Public/img';
    var jsArr=["http://res.wx.qq.com/open/js/jweixin-1.0.0.js","/Public/js/gameE_min.js","/Public/js/lib.js"];
    var images;
    var canvas,stage,initX,bgm;
    var loadBar;
    var shareType=0;
    function getE(id){
        return document.getElementById(id);
    }
    function init(){
        images = images||{};
        canvas = document.getElementById("canvas");

        getE("loadOut").style.width=380*scale+"px";
        getE("loadOut").style.marginLeft=-190*scale+"px";
        getE("loadOut").style.display="block";

        loadBar=new LC_LoaderBar(function(msg){
            getE("loadIn").style.width=msg+"%";
        });
        loadBar.loadJsArr(jsArr,gameReady,true);
    }

    function gameReady(){
        stage = new createjs.Stage(canvas);
        //$("writeInfo").height(brHeight+"px");
        $("#loadPage").hide();
        window.initGame();
    }


</script>

<script>

</script>
</body>
</html>

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
<script src="/Public/js/Game.js?v1.12"></script>

</html>