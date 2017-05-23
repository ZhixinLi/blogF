<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 15:49
 */
class LoginController extends BaseController {

    public function index() {
        $this->view = View::make('login/index');
    }

    public function login() {
        $user = param('user');
        $pwd = param('pwd');

        if (empty($user) || empty($pwd))
            throw new Exception("参数不能为空!");

        $check = Users::where('user', $user)->where('pwd', $pwd)->first();
        if ($check) {

        } else {
            throw new Exception("账号不存在或密码错误!");
        }
    }
}