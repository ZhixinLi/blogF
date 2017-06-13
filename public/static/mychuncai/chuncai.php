<?php
/**
 * User: ZhixinLi
 * Date: 2017/6/12
 * Time: 10:01
 */


function cc_init() {
    $static_path = 'http://localhost/blogF/public';

    $fpath1 = $static_path . "/static/mychuncai/skin/rakutori/face1.gif";
    $fpath2 = $static_path . "/static/mychuncai/skin/rakutori/face2.gif";
    $fpath3 = $static_path . "/static/mychuncai/skin/rakutori/face3.gif";
    $size = getimagesize($fpath1);

    echo '<link rel="stylesheet" type="text/css" href="' . $static_path . '/static/mychuncai/css/style.css">';
    echo '<script src="' . $static_path . '/static/mychuncai/js/jquery.js"></script>';
    echo '<script src="' . $static_path . '/static/mychuncai/js/cc_init.js"></script>';
    echo '<script src="' . $static_path . '/static/mychuncai/js/cc_module.js"></script>';
    echo '<script>';
    echo "var imagewidth = '{$size[0]}';";
    echo "var imageheight = '{$size[1]}';";
    echo '</script>';
    echo '<script>createSkin("' . $fpath1 . '", "' . $fpath2 . '", "' . $fpath3 . '");</script>';
}

cc_init();