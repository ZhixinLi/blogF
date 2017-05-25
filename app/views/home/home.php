<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Home</title>
    <link href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css" rel="stylesheet">
</head>

<body>
<div class="am-g" style="width: 70%;margin: 0 auto">
    <div class="am-u-sm-12 am-u-lg-8">
        <?php foreach ($article as $value): ?>
            <h1><?php echo $value['title']; ?></h1>
            <span><?php echo date('Y-m-d H:i:s', $value['time']); ?></span>
            <div class="content">
                <?php echo $value['content']; ?>
            </div>
            <hr>
        <?php endforeach; ?>
        <?php if ($paginator['pagenum'] > 1): ?>
            <ul class="am-pagination am-pagination-centered">
                <?php if ($paginator['prevpage']): ?>
                    <li><a href="<?php echo $paginator['prevurl']; ?>">&laquo; 上一页</a></li>
                <?php endif; ?>

                <?php foreach ($paginator['pages'] as $page): ?>
                    <?php if ($page['url']): ?>
                        <li>
                            <a href="<?php echo $page['url']; ?>"><?php echo $page['num']; ?></a>
                        </li>
                    <?php else: ?>
                        <li class="am-active"><span><?php echo $page['num']; ?></span></li>
                    <?php endif; ?>
                <?php endforeach; ?>

                <?php if ($paginator['nextpage']): ?>
                    <li><a href="<?php echo $paginator['nexturl']; ?>">下一页 &raquo;</a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>


    <div class="am-u-sm-0 am-u-lg-4">
        <div id="search" style="border: 1px solid grey;height: 20%">
            查询
        </div>

        <div id="tag" style="border: 1px solid grey;height: 20%">
            分类
        </div>

        <div id="dialog" style="border: 1px solid grey;height: 20%">
            云标签
        </div>
    </div>
</div>

</body>

</html>