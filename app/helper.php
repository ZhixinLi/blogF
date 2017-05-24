<?php
/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 16:04
 */

/**
 * 获取Get，Post参数
 *
 * @return array
 */
function param($key, $default = null) {
    if ($default !== null)
        return $default;

    $param = isset($_GET[$key]) ? $_GET[$key] : null;

    if (isset($parm))
        return $param;
    return $_POST[$key];
}

function get($key, $default = null) {
    if ($default !== null)
        return $default;
    return $_GET[$key];
}

function post($key, $default = null) {
    if ($default !== null)
        return $default;
    return $_POST[$key];
}

/**
 * 重定向
 */
function redirect($param) {
    $url = dirname($_SERVER['PHP_SELF']) . '/' . $param;
    header('Location: ' . $url);
}

function redirect_404() {
    $url = dirname($_SERVER['PHP_SELF']) . '/home';
    $time = 50;
    header("refresh:{$time};url={$url}");
    echo("<section style='border: 1px solid black;text-align: center;width: 60%;height:30%;position:relative;top:25%;margin: 0 auto;'>404页面不存在，<span id='time'>$time</span> s后将<a href=\"" . $url . "\">跳转</a>" . "<script>var time=$time;(function(){setInterval('document.getElementById(" . "\"time\"" . ").innerHTML=time;time--;', 1000);})();</script></section>");
}

function redirect_success() {

}

function redirect_error($param, $msg, $time) {
    $url = dirname($_SERVER['PHP_SELF']) . '/' . $param;

    header("refresh:{$time};url={$url}");
    echo("<section style='border: 1px solid black;text-align: center;width: 60%;height:30%;position:relative;top:25%;margin: 0 auto;'>" . $msg . ",<span id='time'>$time</span> s后将<a href=\"" . $url . "\">跳转</a>" . "<script>var time=$time;(function(){setInterval('document.getElementById(" . "\"time\"" . ").innerHTML=time;time--;', 1000);})();</script></section>");
}