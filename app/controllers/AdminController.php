<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 17:30
 */
class AdminController extends AuthController {

    public function index() {
        $this->view = View::make('admin/index');
    }
}