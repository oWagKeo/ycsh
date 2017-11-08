<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo C('WEB_NAME');?>管理后台</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="/Public/admin/css/amazeui.min.css"/>
  <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="/Public/admin/js/jquery.min.js"></script>
  <!--<![endif]-->
  <script src="/Public/admin/js/amazeui.min.js"></script>
  <script src="/Public/admin/js/app.js"></script>
</head>
<body style="width:100%;height:100%;position:absolute;top: 0;left:0;background:url(/Public/admin/img/timg.jpg)center no-repeat;background-size:cover;display: flex;display: -webkit-flex" >
<div class="am-g" style="margin: auto">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <form class="am-form am-form-horizontal" action="/admin.php/Logreg/logincheck" method="post" style="background: #eeeeee; padding: 30px; border-radius: 9px">
      <div class="am-form-group">
        <label class="am-u-sm-12" style="text-align: center; font-size: 24px;"><?php echo C('WEB_NAME');?>管理登录</label>
      </div>
      <hr>
      <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">账号</label>
        <div class="am-u-sm-9">
          <input type="text" name="username"  placeholder="输入你的管理员账号" required>
        </div>
      </div>
      <div class="am-form-group">
        <label  class="am-u-sm-3 am-form-label">密码</label>
        <div class="am-u-sm-9">
          <input type="password" name="password" placeholder="输入你的密码吧"  required>
        </div>
      </div>
      <!--<div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">验证码</label>
        <div class="am-u-sm-9 am-fl" >
            <input name="ver"  type="text"  placeholder="验证码" >
            <span  style="position: absolute;width: 39%;height: 100%;top: 0;right: 5%;">
              <img  style="width: 100%; height: 100%" src="/admin.php/Logreg/verification" id="img_code">
            </span>
        </div>
      </div>-->
      <div class="am-form-group">
        <div class="am-u-sm-12">
          <button type="submit" class="am-btn am-btn-primary am-btn-block" >提交登入</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<script>
  //点击刷新验证码图片
  $("#img_code").click(function(){
      $(this).attr('src','/admin.php/Logreg/verification/random/'+Math.random())
  })
</script>
</html>