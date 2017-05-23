<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:41
 */
class BaseController {

    protected $view;

    public function __construct() {

    }

    public function __destruct() {
        $view = $this->view;
        if ($view instanceof View) {
            if (!empty($view->data))
                extract($view->data);//将值赋给key
            require $view->view;//引入页面
        }
    }
}