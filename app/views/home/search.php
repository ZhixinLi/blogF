<!DOCTYPE html>

<html lang="en">

<?php require BASE_PATH . '/app/views/layout/home_head.php'; ?>

<body style="background-image: url(../../public/static/img/bg.png)">
<div class="am-g am-g-fixed blog-g-fixed" style="background-color: white">
    <?php require BASE_PATH . '/app/views/layout/slider.php'; ?>
    <div class="am-u-md-8">
        <div class="am-panel-group" id="accordion">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                <!--列表标题-->
                <div class="am-list-news-hd am-cf">
                    <!--带更多链接-->
                    <a href="###" class="">
                        <h1>按标题查询</h1>
                    </a>
                </div>

                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <!--缩略图在标题上方-->
                        <?php foreach ($article as $key => $value): ?>
                            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-top">
                                <div class=" am-list-main">
                                    <h3 class="am-list-item-hd">
                                        <a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/essay?id=" . $value['id']; ?>"><?php echo $value['title']; ?></a>
                                    </h3>
                                    <span class="am-list-date"><?php echo date('Y-m-d H:i:s', $value['time']); ?></span>
                                    <div class="am-list-item-text">
                                        <?php echo json_decode($value['content']); ?>
                                    </div>

                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php require BASE_PATH . '/app/views/layout/paginator.php'; ?>
    </div>

    <?php require BASE_PATH . '/app/views/layout/home_sidebar.php'; ?>
</div>

<?php require BASE_PATH . '/app/views/layout/home_footer.php'; ?>
</body>
</html>

<script>
    <?php require BASE_PATH . '/public/static/js/home_common.js'; ?>
</script>