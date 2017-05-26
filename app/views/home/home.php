<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blog | Amaze UI Example</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="/i/favicon.png">

    <link href="http://cdn.amazeui.org/amazeui/2.7.2/css/amazeui.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.min.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.ie8polyfill.min.js"></script>
    <script src="http://cdn.amazeui.org/amazeui/2.7.2/js/amazeui.widgets.helper.min.js"></script>
</head>

<body>
<div class="am-g am-g-fixed blog-g-fixed">
    <div data-am-widget="slider" class="am-slider am-slider-a5" data-am-slider='{&quot;directionNav&quot;:false}' style="margin-bottom: 20px;">
        <ul class="am-slides">
            <li>
                <img style="height: 200px;" src="http://s.amazeui.org/media/i/demos/bing-1.jpg">

            </li>
            <li>
                <img style="height: 200px;" src="http://s.amazeui.org/media/i/demos/bing-2.jpg">

            </li>
            <li>
                <img style="height: 200px;" src="http://s.amazeui.org/media/i/demos/bing-3.jpg">

            </li>
            <li>
                <img style="height: 200px;" src="http://s.amazeui.org/media/i/demos/bing-4.jpg">

            </li>
        </ul>
    </div>
    <div class="am-u-md-8">
        <div class="am-panel-group" id="accordion">
            <?php foreach ($article as $key => $value): ?>
                <div class="am-panel am-panel-default">
                    <div class="am-panel-hd">
                        <h4 class="am-panel-title" data-am-collapse="{parent: '#accordion', target: '#do-not-say-<?php echo $key; ?>'}">
                            <?php echo $value['title']; ?>
                        </h4>
                    </div>
                    <div id="do-not-say-<?php echo $key; ?>" class="am-panel-collapse am-collapse">
                        <div class="am-panel-bd">
                            <span><?php echo json_decode($value['content']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

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

    <div class="am-u-md-4 blog-sidebar">
        <div class="am-panel-group">
            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">搜索</div>
                <div class="am-input-group">
                    <input type="text" class="am-form-field">
                    <span class="am-input-group-btn">
        <button class="am-btn am-btn-primary" type="button">搜索</button>
      </span>
                </div>
            </section>

            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">目录</div>
                <ul class="am-list blog-list">
                    <li><a href="#">2017年1月</a></li>
                    <li><a href="#">2017年2月</a></li>
                    <li><a href="#">2017年3月</a></li>
                    <li><a href="#">2017年4月</a></li>
                    <li><a href="#">2017年5月</a></li>
                </ul>
            </section>

            <section class="am-panel am-panel-default">
                <div class="am-panel-hd">云标签</div>
                <div class="am-panel-hd"></div>
            </section>
        </div>
    </div>
</div>
</body>
</html>