<?php

/**
 * User: Lee
 * Date: 2017/5/24
 * Time: 15:02
 */
class Session {

    public static function init() {
        session_start();
    }

    public static function set($name, $value) {
        self::init();

        $_SESSION[$name] = $value;
    }

    public static function get($name) {
        self::init();

        if (isset($_SESSION[$name]))
            return $_SESSION[$name];
        else
            return false;
    }

    public static function del($name) {
        self::init();

        unset($_SESSION[$name]);
    }

    public function destroy() {
        $_SESSION = array();
        session_destroy();
    }
}