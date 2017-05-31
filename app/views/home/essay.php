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

    <style>body {
            background: #ffffff;
            padding: 0;
        }

        #tagsList {
            position: relative;
            width: 600px;
            height: 300px;
            margin: -50px auto;
            background: #ffffff;
        }

        #tagsList a {
            position: absolute;
            top: 0px;
            left: 0px;
            font-family: Microsoft YaHei;
            color: #b27f3f;
            font-weight: bold;
            text-decoration: none;
            padding: 2px 5px;
        }

        #tagsList a:hover {
            color: #FF0000;
            letter-spacing: 2px;
        }</style>

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
                <!--                <div class="am-panel-hd">-->
                <div id="tagsList" style="width:auto; border:1px solid #ccc;margin-top: 0;">
                    <span><a href="http://www.111cn.net">快递查询</a></span>
                    <span><a href="http://www.111cn.net">火车票查询</a></span>
                    <span><a href="http://www.111cn.net">机票</a></span>
                    <span><a href="http://www.111cn.net">手机号</a></span>
                    <span><a href="http://www.111cn.net">公交查询</a></span>
                    <span><a href="http://www.111cn.net">身份证</a></span>
                    <span><a href="http://www.111cn.net">天气预报</a></span>
                    <span><a href="http://www.111cn.net">在线翻译</a></span>
                    <span><a href="http://www.111cn.net">交通违章</a></span>
                    <span><a href="http://www.111cn.net">IP地址</a></span>
                    <span><a href="http://www.111cn.net">万年历</a></span>
                    <span><a href="http://www.111cn.net">周公解梦</a></span>
                    <span><a href="http://www.111cn.net">网页QQ</a></span>
                    <span><a href="http://www.111cn.net">百度输入法</a></span>
                    <span><a href="http://www.111cn.net">千千静听</a></span>
                    <span><a href="http://www.111cn.net">魔兽世界</a></span>
                    <span><a href="http://www.111cn.net">梦幻西游</a></span>
                    <span><a href="http://www.111cn.net">洛克王国</a></span>
                    <span><a href="http://www.111cn.net">DNF</a></span>
                    <span><a href="http://www.111cn.net">DOTA</a></span>
                    <span><a href="http://www.111cn.net">CF</a></span>
                    <span><a href="http://www.111cn.net">单机游戏</a></span>
                    <span><a href="http://www.111cn.net">小游戏</a></span>
                    <span><a href="http://www.111cn.net">QQ飞车</a></span>
                    <span><a href="http://www.111cn.net">植物大战僵尸</a></span>
                    <span><a href="http://www.111cn.net">连连看</a></span>
                    <span><a href="http://www.111cn.net">斗地主</a></span>
                    <span><a href="http://www.111cn.net">合金弹头</a></span>
                    <span><a href="http://www.111cn.net">保卫萝卜</a></span>
                    <span><a href="http://www.111cn.net">玫瑰小镇</a></span>
                </div>
                <!--                </div>-->
            </section>
        </div>
    </div>
</div>
</body>
</html>

<script>
    (function () {

        var radius = 120;
        var dtr = Math.PI / 180;
        var d = 300;
        var mcList = [];
        var active = false;
        var lasta = 1;
        var lastb = 1;
        var distr = true;
        var tspeed = 10;
        var size = 250;

        var mouseX = 0;
        var mouseY = 0;

        var howElliptical = 1;

        var aA = null;
        var oDiv = null;

        window.onload = function () {
            var i = 0;
            var oTag = null;

            oDiv = document.getElementById('tagsList');

            aA = oDiv.getElementsByTagName('a');

            for (i = 0; i < aA.length; i++) {
                oTag = {};

                oTag.offsetWidth = aA[i].offsetWidth;
                oTag.offsetHeight = aA[i].offsetHeight;

                mcList.push(oTag);
            }

            sineCosine(0, 0, 0);

            positionAll();

            oDiv.onmouseover = function () {
                active = true;
            };

            oDiv.onmouseout = function () {
                active = false;
            };

            oDiv.onmousemove = function (ev) {
                var oEvent = window.event || ev;

                mouseX = oEvent.clientX - (oDiv.offsetLeft + oDiv.offsetWidth / 2);
                mouseY = oEvent.clientY - (oDiv.offsetTop + oDiv.offsetHeight / 2);

                mouseX /= 5;
                mouseY /= 5;
            };

            setInterval(update, 100);
        };

        function update() {
            var a;
            var b;

            if (active) {
                a = (-Math.min(Math.max(-mouseY, -size), size) / radius ) * tspeed;
                b = (Math.min(Math.max(-mouseX, -size), size) / radius ) * tspeed;
            }
            else {
                a = lasta * 0.98;
                b = lastb * 0.98;
            }

            lasta = a;
            lastb = b;

            if (Math.abs(a) <= 0.01 && Math.abs(b) <= 0.01) {
                return;
            }

            var c = 0;
            sineCosine(a, b, c);
            for (var j = 0; j < mcList.length; j++) {
                var rx1 = mcList[j].cx;
                var ry1 = mcList[j].cy * ca + mcList[j].cz * (-sa);
                var rz1 = mcList[j].cy * sa + mcList[j].cz * ca;

                var rx2 = rx1 * cb + rz1 * sb;
                var ry2 = ry1;
                var rz2 = rx1 * (-sb) + rz1 * cb;

                var rx3 = rx2 * cc + ry2 * (-sc);
                var ry3 = rx2 * sc + ry2 * cc;
                var rz3 = rz2;

                mcList[j].cx = rx3;
                mcList[j].cy = ry3;
                mcList[j].cz = rz3;

                per = d / (d + rz3);

                mcList[j].x = (howElliptical * rx3 * per) - (howElliptical * 2);
                mcList[j].y = ry3 * per;
                mcList[j].scale = per;
                mcList[j].alpha = per;

                mcList[j].alpha = (mcList[j].alpha - 0.6) * (10 / 6);
            }

            doPosition();
            depthSort();
        }

        function depthSort() {
            var i = 0;
            var aTmp = [];

            for (i = 0; i < aA.length; i++) {
                aTmp.push(aA[i]);
            }

            aTmp.sort
            (
                function (vItem1, vItem2) {
                    if (vItem1.cz > vItem2.cz) {
                        return -1;
                    }
                    else if (vItem1.cz < vItem2.cz) {
                        return 1;
                    }
                    else {
                        return 0;
                    }
                }
            );

            for (i = 0; i < aTmp.length; i++) {
                aTmp[i].style.zIndex = i;
            }
        }

        function positionAll() {
            var phi = 0;
            var theta = 0;
            var max = mcList.length;
            var i = 0;

            var aTmp = [];
            var oFragment = document.createDocumentFragment();

            //随机排序
            for (i = 0; i < aA.length; i++) {
                aTmp.push(aA[i]);
            }

            aTmp.sort
            (
                function () {
                    return Math.random() < 0.5 ? 1 : -1;
                }
            );

            for (i = 0; i < aTmp.length; i++) {
                oFragment.appendChild(aTmp[i]);
            }

            oDiv.appendChild(oFragment);

            for (var i = 1; i < max + 1; i++) {
                if (distr) {
                    phi = Math.acos(-1 + (2 * i - 1) / max);
                    theta = Math.sqrt(max * Math.PI) * phi;
                }
                else {
                    phi = Math.random() * (Math.PI);
                    theta = Math.random() * (2 * Math.PI);
                }
                //坐标变换
                mcList[i - 1].cx = radius * Math.cos(theta) * Math.sin(phi);
                mcList[i - 1].cy = radius * Math.sin(theta) * Math.sin(phi);
                mcList[i - 1].cz = radius * Math.cos(phi);

                aA[i - 1].style.left = mcList[i - 1].cx + oDiv.offsetWidth / 2 - mcList[i - 1].offsetWidth / 2 + 'px';
                aA[i - 1].style.top = mcList[i - 1].cy + oDiv.offsetHeight / 2 - mcList[i - 1].offsetHeight / 2 + 'px';
            }
        }

        function doPosition() {
            var l = oDiv.offsetWidth / 2;
            var t = oDiv.offsetHeight / 2;
            for (var i = 0; i < mcList.length; i++) {
                aA[i].style.left = mcList[i].cx + l - mcList[i].offsetWidth / 2 + 'px';
                aA[i].style.top = mcList[i].cy + t - mcList[i].offsetHeight / 2 + 'px';

                aA[i].style.fontSize = Math.ceil(12 * mcList[i].scale / 2) + 8 + 'px';

                aA[i].style.filter = "alpha(opacity=" + 100 * mcList[i].alpha + ")";
                aA[i].style.opacity = mcList[i].alpha;
            }
        }

        function sineCosine(a, b, c) {
            sa = Math.sin(a * dtr);
            ca = Math.cos(a * dtr);
            sb = Math.sin(b * dtr);
            cb = Math.cos(b * dtr);
            sc = Math.sin(c * dtr);
            cc = Math.cos(c * dtr);
        }
    })();
</script>