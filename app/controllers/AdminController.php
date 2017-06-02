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

    public function modify() {
        $id = post('id');
        $title = post('title');
        $content = post('content');
        $tag = post('tag');

        if (empty($title) || empty($content) || empty($tag)) {
            redirect('admin-index');
        }

        if (!empty($id)) {
            Articles::where('id', $id)->update(['title' => $title, 'tag' => $tag, 'content' => json_encode($content), 'time' => time(), 'date' => date('Ymd')]);
        } else {
            Articles::insert(['title' => $title, 'tag' => $tag, 'content' => json_encode($content), 'time' => time(), 'date' => date('Ymd')]);
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