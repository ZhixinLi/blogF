<?php
/**
 * User: Lee
 * Date: 2017/6/2
 * Time: 9:54
 */


$weichuncai_base_data = array(
    'site_path'       => 'http://localhost/blogF/public/index.php/',
    'weichuncai_path' => 'http://localhost/blogF/public/static/newchuncai/',
);

function get_wcc_lifetime($starttime) {
    $endtime = time();
    $lifetime = $endtime - $starttime;
    $day = intval($lifetime / 86400);
    $lifetime = $lifetime % 86400;
    $hours = intval($lifetime / 3600);
    $lifetime = $lifetime % 3600;
    $minutes = intval($lifetime / 60);
    $lifetime = $lifetime % 60;
    return array('day' => $day, 'hours' => $hours, 'minutes' => $minutes, 'seconds' => $lifetime);
}

function plugins_url($file, $weichuncai_base_data) {
    return $weichuncai_base_data['weichuncai_path'] . $file;
}

function get_option($value) {
    $weichuncai_db = mysqli_connect('localhost', 'root', '111111', 'blogf');
    if ($value == 'chuncai') {
        $sql = "select * from weichuncai_table where id=1";
        $data = mysqli_query($weichuncai_db, $sql);
        $data = mysqli_fetch_assoc($data);
        if (!$data) {
            $data['value'] = sm_init();
        } else {
            $data['value'] = unserialize($data['value']);
        }
        return $data['value'];
    } else {
        $sql = "select value from weichuncai_table where title='{$value}' limit 1";
        $data = mysqli_query($weichuncai_db, $sql);
        $data = mysqli_fetch_assoc($data);
        if ($data) {
            $data['value'] = unserialize($data['value']);
        }
    }
    return $data['value'];
}

//默认的春菜设置
function sm_init() {
    global $wcc;
    $lifetime = time();
    $wcc = array(
        'notice'     => '主人暂时还没有写公告呢，这是主人第一次使用伪春菜吧',
        'adminname'  => '',
        'isnotice'   => '',
        'ques'       => array('早上好', '中午好', '下午好', '晚上好', '晚安'),
        'ans'        => array('早上好～', '中午好～', '下午好～', '晚上好～', '晚安～'),
        'lifetime'   => array(
            'rakutori'    => $lifetime,
            'neko'        => $lifetime,
            'chinese_moe' => $lifetime,
        ),
        'ccs'        => array('rakutori', 'neko', 'chinese_moe'),
        'defaultccs' => 'rakutori',
        'foods'      => array('金坷垃', '咸梅干'),
        'eatsay'     => array('吃了金坷垃，一刀能秒一万八～！', '吃咸梅干，变超人！哦耶～～～'),
    );
    return $wcc;
}