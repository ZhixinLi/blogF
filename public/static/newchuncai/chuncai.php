<?php
/**
 * User: Lee
 * Date: 2017/6/2
 * Time: 9:55
 */
$weichuncai_path = substr(__FILE__, 0, -17);

require BASE_PATH . '/public/static/newchuncai/config.php';

$wcc = get_option('chuncai');

//获得春菜
function get_chuncai($weichuncai_base_data, $weichuncai_path) {
    echo '<link rel="stylesheet" type="text/css" href="' . $weichuncai_base_data['weichuncai_path'] . 'css/style.css">';
    echo '<script>';
    $wcc = get_option('chuncai');
    if ($wcc == '') {
        sm_init();
        $wcc = get_option('chuncai');
    }

    if (preg_match('/userdefccs_/i', $wcc['defaultccs'])) {
        $key = str_replace('userdefccs_', '', $wcc['defaultccs']);
        $fpath = $wcc['userdefccs'][$key]['face'];
        $fpath1 = $fpath[0];
        $fpath2 = $fpath[1] ? $fpath[1] : $fpath1;
        $fpath3 = $fpath[2] ? $fpath[2] : $fpath1;
    } else {
        $fpath1 = plugins_url('skin/' . $wcc['defaultccs'] . '/face1.gif', $weichuncai_base_data);
        $fpath2 = plugins_url('skin/' . $wcc['defaultccs'] . '/face2.gif', $weichuncai_base_data);
        $fpath3 = plugins_url('skin/' . $wcc['defaultccs'] . '/face3.gif', $weichuncai_base_data);
    }

    $size = getimagesize($fpath1);

    echo 'var _site_path = "' . $weichuncai_base_data['site_path'] . '";';
    echo 'var _weichuncai_path = "' . $weichuncai_base_data['weichuncai_path'] . '";';
    echo "var imagewidth = '{$size[0]}';";
    echo "var imageheight = '{$size[1]}';";
    echo '</script>';
    echo '<script src="' . $weichuncai_base_data['weichuncai_path'] . 'js/jquery.js"></script>';
    echo '<script src="' . $weichuncai_base_data['weichuncai_path'] . 'js/common.js"></script>';
    echo '<script>createFace("' . $fpath1 . '", "' . $fpath2 . '", "' . $fpath3 . '");</script>';
}

get_chuncai($weichuncai_base_data, $weichuncai_path);