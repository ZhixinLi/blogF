<!DOCTYPE html>

<html lang="en">

<?php require BASE_PATH . '/app/views/layout/home_head.php'; ?>

<body style="background-image: url(../../public/static/img/bg.png)">
<div class="am-g am-g-fixed blog-g-fixed" style="background-color: white">
    <?php require BASE_PATH . '/app/views/layout/slider.php'; ?>
    <div class="am-u-md-8">
        <div class="am-panel-group" id="accordion">
            <article class="am-article">
                <div class="am-article-hd">
                    <h1 class="am-article-title"><?php echo $essay['title']; ?></h1>
                    <ol class="am-breadcrumb">
                        <li><a href="#">首页</a></li>
                        <li><a href="#">分类</a></li>
                        <li class="am-active">内容</li>
                    </ol>
                    <p class="am-article-meta"><?php echo date('Y-m-d H:i:s', $essay['time']); ?></p>
                </div>
                <hr class="am-article-divider">
                <div class="am-article-bd">
                    <?php echo json_decode($essay['content']); ?>
                </div>
            </article>

            <div class="am-cf">
                <?php if (empty($prevdata)) {
                    echo '<a href="#" class="am-btn am-btn-success am-fl" style="width: 20%;" disabled="disabled">没有了</a>';
                } else {
                    echo '<a class="am-btn am-btn-success am-fl" style="width: 20%;" href="' . dirname($_SERVER['PHP_SELF']) . "/essay?id=" . $prevdata['id'] . '" target="_blank" data-am-popover="{content:\'' . $prevdata['title'] . '\',trigger:\'' . 'hover focus' . '\'}">上一篇</a>';
                }
                ?>

                <a class="am-btn am-btn-primary" style="width: 20%;margin-left: 20%" href="<?php echo dirname($_SERVER['PHP_SELF']) . "/home"; ?>">返回</a>

                <?php if (empty($nextdata)) {
                    echo '<a href="#" class="am-btn am-btn-success am-fr" style="width: 20%;" disabled="disabled">没有了</a>';
                } else {
                    echo '<a class="am-btn am-btn-success am-fr" style="width: 20%;" href="' . dirname($_SERVER['PHP_SELF']) . "/essay?id=" . $nextdata['id'] . '" target="_blank" data-am-popover="{content:\'' . $nextdata['title'] . '\',trigger:\'' . 'hover focus' . '\'}">下一篇</a>';
                }
                ?>
            </div>
        </div>
    </div>

    <?php require BASE_PATH . '/app/views/layout/home_sidebar.php'; ?>
</div>

<?php require BASE_PATH . '/app/views/layout/home_footer.php'; ?>
</body>
</html>

<script>
    <?php require BASE_PATH . '/public/static/js/home_common.js'; ?>
</script>