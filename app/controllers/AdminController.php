<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 17:30
 */
class AdminController extends AuthController {

    public function index() {
        $limit = config('common.page_num');
        $page = (int)get('page', 1);
        $count = Articles::count();

        $this->view = View::make('admin/index')
            ->with('userinfo', $this->view->data)
            ->with('article', Articles::orderBy('time', 'desc')->offset(($page - 1) * $limit)->limit($limit)->get())->paginate($page, $limit, $count, 'admin-index');
    }

    public function add() {
        $title = param('title');
        $content = param('content');

        if (empty($title) || empty($content)) {
            redirect('admin-index');
        }

        Articles::insert(['title' => $title, 'content' => json_encode($content), 'time' => time(), 'date' => date('Ymd')]);
    }

    public function modify() {
        $id = param('id');
        $title = param('title');
        $content = param('content');

        if (empty($title) || empty($content)) {
            redirect('admin-index');
        }

        if (!empty($id)) {
            Articles::where('id', $id)->update(['title' => $title, 'content' => json_encode($content), 'time' => time(), 'date' => date('Ymd')]);
        } else {
            Articles::insert(['title' => $title, 'content' => json_encode($content), 'time' => time(), 'date' => date('Ymd')]);
        }
    }

    public function status() {
        $id = param('id');
        $status = param('status');

        if (empty($id) || empty($status)) {
            redirect('admin-index');
        }

        Articles::where('id', $id)->update(['status' => $status]);
    }

    public function logout() {
        Session::del('uid');
    }
}