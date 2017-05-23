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