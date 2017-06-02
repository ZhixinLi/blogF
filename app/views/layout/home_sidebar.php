<div class="am-u-md-4 blog-sidebar">
    <div class="am-panel-group">
        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">搜索</div>
            <div class="am-input-group">
                <input type="text" class="am-form-field" id="search_str">
                <span class="am-input-group-btn">
                        <button class="am-btn am-btn-primary" id="search" type="button">搜索</button>
                    </span>
            </div>
        </section>

        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">简介</div>
            <div style="padding: 10px; text-align:left;
 text-indent:2em;">
                不过英文一般不会存在编码问题，只有中文数据才会有这个问题。比如你用Zend Studio或Editplus写程序时，用的是gbk编码，如果数据需要入数据库，而数据库的编码为utf8时，这时就要把数据进行编码转换，不然进到数据库就会变成乱码。
            </div>
        </section>

        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">目录</div>
            <ul class="am-list blog-list">
                <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/date?month=1"; ?>">2017年1月</a></li>
                <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/date?month=2"; ?>">2017年2月</a></li>
                <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/date?month=3"; ?>">2017年3月</a></li>
                <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/date?month=4"; ?>">2017年4月</a></li>
                <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) . "/date?month=5"; ?>">2017年5月</a></li>
            </ul>
        </section>

        <section class="am-panel am-panel-default">
            <div class="am-panel-hd">云标签</div>
            <div id="tagsList" style="width:auto; border:1px solid #ccc;margin-top: 0;margin-bottom: 0">
                <?php
                foreach ($tags as $value) {
                    echo '<span><a href="' . dirname($_SERVER['PHP_SELF']) . "/essay?id=" . $value['id'] . '">' . $value['tag'] . '</a></span>';
                }
                ?>
            </div>
        </section>
    </div>
</div>