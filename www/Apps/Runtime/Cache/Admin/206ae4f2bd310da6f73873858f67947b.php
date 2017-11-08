<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo C('WEB_NAME');?>管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <link rel="stylesheet" href="/Public/admin/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/admin/css/admin.css">
    <link rel="stylesheet" href="/Public/admin/css/style.css">
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/Public/admin/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="/Public/admin/js/amazeui.min.js"></script>
    <script src="/Public/admin/js/app.js"></script>
</head>
<body>
<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong><?php echo C('WEB_NAME');?>管理后台</strong>
    </div>
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>
    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-user"></span> <?php echo ($header["user_name"]); ?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="/admin.php/Index/rev_pwd"><span class="am-icon-cog"></span> 修改密码</a></li>
                    <li><a href="/admin.php/Logreg/logout"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list" id="collapase-nav">
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($vo["menu"])): ?><li class="admin-parent">
                            <a class="am-cf" data-am-collapse="{target: '#collapse-<?php echo ($key); ?>'}">
                                <span class="<?php echo ($vo["icon"]); ?>"></span> <?php echo ($vo["name"]); ?>
                                <span class="am-icon-angle-right am-fr am-margin-right"></span>
                            </a>
                            <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-<?php echo ($key); ?>">
                                <?php if(is_array($vo["menu"])): $i = 0; $__LIST__ = $vo["menu"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                                        <a href="<?php echo ($v["2"]); ?>" class="am-cf">
                                            <span class="<?php echo ($v["3"]); ?>"></span> <?php echo ($v["1"]); ?>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!-- sidebar end -->
    <!-- content start -->
    <div class="admin-content"  style="overflow: scroll;">
        <?php echo ($nav); ?><form id="form" action="/admin.php/Index/user_save" method="post" class="am-form am-form-horizontal">
    <div class="am-form-group">
        <label class="am-u-sm-2 am-form-label">用户名</label>
        <div class="am-u-sm-5">
            <input type="text" name="name" value="<?php echo ($info["u_name"]); ?>" required>
        </div>
        <div class="am-u-sm-5"></div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-2 am-form-label">银行卡</label>
        <div class="am-u-sm-5">
            <input type="text" name="cardno" value="<?php echo ($info["u_cardno"]); ?>" required>
        </div>
        <div class="am-u-sm-5"> </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-2 am-form-label">电话</label>
        <div class="am-u-sm-5">
            <input type="text" name="phone" value="<?php echo ($info["u_phone"]); ?>" required>
        </div>
        <div class="am-u-sm-5"></div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-2 am-form-label">积分</label>
        <div class="am-u-sm-5">
            <input type="number" min="0" name="score" value="<?php echo ($info["u_score"]); ?>" required>
        </div>
        <div class="am-u-sm-5"></div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-2 am-form-label">抽奖次数</label>
        <div class="am-u-sm-5">
            <input type="number" min="0" name="lottery" value="<?php echo ($info["u_lottery"]); ?>">
        </div>
        <div class="am-u-sm-5"></div>
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-10 am-u-sm-offset-2">
            <input type="hidden" name="id" value="<?php echo ($info["u_id"]); ?>">
            <button type="submit" class="am-btn am-btn-primary">保存</button>
        </div>
    </div>
</form>
<script>
    $('#collapse-user').collapse({toggle: true});
</script>
        <!--<footer class="admin-content-footer">
            <hr>
        </footer>-->
    </div>
    <!-- content end -->
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
</body>
</html>