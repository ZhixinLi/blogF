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