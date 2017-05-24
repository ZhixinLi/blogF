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

        if (empty($user) || empty($pwd)) {
            redirect_error('login', '账号密码不能为空!', 15);
            exit;
        }

        $check = Users::where('user', $user)->where('pwd', $pwd)->first();
        if ($check) {
            Session::set('uid', $check['id']);
            redirect('admin-index');
        } else {
            redirect_error('login', '账号密码错误!', 15);
        }
    }
}