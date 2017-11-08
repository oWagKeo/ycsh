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
        <?php echo ($nav); ?><div class="am-g" style="margin-bottom: 10px">
    <div class="am-u-sm-12" style="text-align: center">
        <form class="am-form am-form-inline" action="/admin.php/Index/goods_list" method="get">
            <div class="" style="width: 100%;padding-top: 5px"></div>
            <div class="am-form-group">
                <input type="text" name="name" value="<?php echo ($search["name"]); ?>" placeholder="劵名" style="width: 150px;">
            </div>
            <div class="am-form-group">
                <select name="type" id="type">
                    <option value="all">所有分类</option>
                    <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($i); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    <option value="free">免费劵</option>
                </select>
            </div>
            <div class="am-form-group">
                <input class="am-btn am-btn-primary am-radius am-btn-sm" type="submit" value="搜索">
            </div>
        </form>
    </div>
</div>
<table class="am-table am-table-bordered am-table-radius am-table-striped am-table-hover am-table-compact">
    <?php if(empty($info)): ?><tr><th>暂无数据</th></tr>
    <?php else: ?>
        <tr><td colspan="11" align="right">共有<?php echo ($count); ?>条数据</td></tr>
        <tr>
            <th>合作方</th>
          <!--  <th>介绍</th>-->
           <!-- <th>缩略图</th>-->
            <th>明细</th>
            <th>价格</th>
            <th>剩余积分兑换数量</th>
            <th>剩余免费兑换数量</th>
            <!--<th>有效期</th>-->
            <th>分类</th>
            <th>上架</th>
            <th>上架时间</th>
            <th>编辑</th>
            <th>移除</th>
        </tr>
        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["g_name"]); ?></td>
                <!--<td><?php echo ($vo["g_desc"]); ?></td>-->
              <!--  <td><img src="/Public/admin/img/goods/<?php echo ($vo["g_thum"]); ?>" width="30px"></td>-->
                <td><?php echo (msubstr($vo["g_desc"],0,8)); ?></td>
                <td><?php echo ($vo["g_price"]); ?></td>
                <td><?php echo ($vo["g_count"]); ?></td>
                <td><?php echo ($vo["g_free"]); ?></td>
               <!-- <td><?php echo ($vo["g_term"]); ?></td>-->
                <td><?php echo ($type[$vo['g_type']-1]); ?></td>
                <td align="center">
                    <?php if($vo["g_show"] == 1): ?><img src="/Public/admin/img/yes.gif">
                    <?php else: ?>
                        <img src="/Public/admin/img/no.gif"><?php endif; ?>
                </td>
                <td align="center"><?php echo (date('Y-m-d H:i',$vo["g_start"])); ?>~<?php echo (date('Y-m-d H:i',$vo["g_end"])); ?></td>
                <td align="center">
                    <a href="/admin.php/Index/goods_edit/gid/<?php echo ($vo["g_id"]); ?>" title="编辑"><span class="am-icon-edit am-icon-sm "></span></a>&nbsp;
                </td><td align="center">
                    <a data-name="<?php echo ($vo["g_name"]); ?>" data-id="<?php echo ($vo["g_id"]); ?>" title="移除"  name="remove"><span class="am-icon-trash am-icon-sm "></span></a>&nbsp;
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr align="center">
            <td colspan="13"><?php echo ($page); ?></td>
        </tr><?php endif; ?>
</table>

<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">提示信息</div>
        <div class="am-modal-bd">
           确定要删除这条记录吗？
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
        </div>
    </div>
</div>

<script>
    $('a[name = "remove"]').click(function () {
        uid = $(this).attr('data-id');
        p = $(this).parent().parent();
        $("#my-confirm .am-modal-bd").text('确定要移除用户['+$(this).attr('data-name')+']吗？');
        $('#my-confirm').modal({
            onConfirm: function (options) {
                $.ajax({
                    type:'post',
                    url:'/admin.php/Index/goods_remove',
                    data:{uid:uid},
                    success:function (res) {
                        if(res == 1){
                            p.remove();
                            alert('移除成功');
                        }else{
                            alert('移除失败');
                        }
                    }
                })
            },
        })
    })

    $(function () {
        $("#type option[value = '<?php echo ($search["type"]); ?>']").attr('selected',true);
    })
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