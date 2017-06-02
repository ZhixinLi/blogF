<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Hello Amaze UI</title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="icon" type="image/png" href="assets/i/favicon.png">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">


    <link href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css" rel="stylesheet">
</head>

<body>

<header class="am-topbar">
    <h1 class="am-topbar-brand">
        Hello,<a href="#"><?php echo $userinfo['nick']; ?></a>
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
            data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
            class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li class="am-active"><a href="#">首页</a></li>
            <li><a href="#">项目</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    菜单 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li class="am-dropdown-header">标题</li>
                    <li><a href="#">关于我们</a></li>
                    <li><a href="#">关于字体</a></li>
                    <li><a href="#">TIPS</a></li>
                </ul>
            </li>
        </ul>

        <form class="am-topbar-form am-topbar-left am-form-inline am-topbar-right" role="search">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索文章">
            </div>
            <button type="submit" class="am-btn am-btn-default am-btn-sm">搜索</button>
            <button class="am-btn am-btn-danger" id="logout" style="margin-left: 20px;">
                <i class="am-icon-power-off"></i>
                注销
            </button>
        </form>
    </div>
</header>

<button class="am-btn am-btn-success" id="add" style="margin-left: 20px;margin-bottom: 20px;">
    <i class="am-icon-plus"></i>
    新增
</button>

<div id="article">
    <table class="am-table am-table-bordered am-table-radius am-table-striped" style="margin: 0 auto;width: 100%">
        <thead>
        <tr>
            <th style="text-align: center">#</th>
            <th style="text-align: center">时间</th>
            <th style="text-align: center">标题</th>
            <th style="text-align: center">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($article as $key => $value): ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo date('Y-m-d H:i:s', $value['time']); ?></td>
                <td><?php echo $value['title']; ?></td>
                <td style="text-align: center">
                    <button type="button" class="am-btn am-btn-warning am-default am-btn-xs" onclick="openModal(<?php echo $key; ?>)">修改</button>
                    <?php if ($value['status'] == 1) {
                        echo '<button type="button" class="am-btn am-btn-danger am-default am-btn-xs" onclick=' . 'closeArticle(' . $value['id'] . ')>关闭</button>';
                    } else {
                        echo '<button type="button" class="am-btn am-btn-success am-default am-btn-xs" onclick=' . 'openArticle(' . $value['id'] . ')>开启</button>';
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php require BASE_PATH . '/app/views/layout/paginator.php'; ?>

    <div class="am-popup" id="my-popup" style="border-radius: 2px;">
        <div class="am-popup-inner">
            <div class="am-popup-hd">
                <h4 class="am-popup-title">
                    <div class="am-form am-form-group" style="margin-top: 3px;">
                        <input type="text" id="modifytitle" placeholder="标题" required/>
                    </div>
                </h4>
                <span data-am-modal-close
                      class="am-close">&times;</span>
            </div>
            <div class="am-popup-bd">
                <div class="am-form am-form-group">
                    <label>
                        <input type="text" placeholder="标签" id="tag" required>
                    </label>
                    <textarea id="modifycontent" style="height: 500px;" placeholder="内容" required></textarea>
                </div>
            </div>
            <input type="hidden" id="modifyid">
            <div style="position:absolute;bottom:0;z-index:1000;width:100%;height:43px;border-top:1px solid #dedede;background-color:#fff">
                <button class="am-btn am-btn-success am-btn-block" style="width: 90%;margin: 0 auto;margin-top: 2px;" id="modifycommit">提交</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.ie8polyfill.min.js"></script>
<script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.widgets.helper.min.js"></script>
</body>
</html>

<script>
    var data =<?php echo $article;?>;
    $('#add').click(function () {
        $('#modifytitle').val('');
        $('#modifycontent').html('');
        $('#modifyid').val('');
        $('#tag').val('');

        $('#my-popup').modal({closeViaDimmer: false});
    });

    $('#logout').click(function () {
        $.ajax({
            type: 'POST',
            url: "<?php echo dirname($_SERVER['PHP_SELF']) . '/admin-logout';?>",
            success: function () {
                location.reload();
            },
            error: function () {
                alert('请求错误，请刷新重试!')
            }
        });
    });

    $('#modifycommit').click(function () {
        $.ajax({
            type: 'POST',
            url: "<?php echo dirname($_SERVER['PHP_SELF']) . '/admin-modify';?>",
            data: {
                id: $('#modifyid').val(),
                title: $('#modifytitle').val(),
                content: $('#modifycontent').val(),
                tag: $('#tag').val()
            },
            success: function () {
                location.reload();
            },
            error: function () {
                alert('请求错误，请刷新重试!')
            }
        });
    });

    function openModal(key) {
        $('#modifytitle').val(data[key]['title']);
        $('#modifycontent').html(JSON.parse(data[key]['content']));
        $('#modifyid').val(data[key]['id']);
        $('#tag').val(data[key]['tag']);

        $('#my-popup').modal({closeViaDimmer: false});
    }

    function closeArticle(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo dirname($_SERVER['PHP_SELF']) . '/admin-status';?>",
            data: {
                id: id,
                status: 0
            },
            success: function () {
                location.reload();
            },
            error: function () {
                alert('请求错误，请刷新重试!')
            }
        });
    }

    function openArticle(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo dirname($_SERVER['PHP_SELF']) . '/admin-status';?>",
            data: {
                id: id,
                status: 1
            },
            success: function () {
                location.reload();
            },
            error: function () {
                alert('请求错误，请刷新重试!')
            }
        });
    }
</script>