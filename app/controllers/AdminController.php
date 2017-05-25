<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 17:30
 */
class AdminController extends AuthController {

    public function index() {


        $this->view = View::make('admin/index')
            ->with('userinfo', $this->view->data)
            ->with('article', Articles::orderBy('time', 'desc')->get());
    }

    public function add() {
        $title = param('title');
        $content = param('content');

        if (empty($title) || empty($content)) {
            redirect('admin-index');
        }

        Articles::insert(['title' => $title, 'content' => $content, 'time' => time(), 'date' => date('Ymd')]);
    }

    public function modify() {
        $id = param('id');
        $title = param('title');
        $content = param('content');

        if (empty($title) || empty($content)) {
            redirect('admin-index');
        }

        if (!empty($id)) {
            Articles::where('id', $id)->update(['title' => $title, 'content' => $content, 'time' => time(), 'date' => date('Ymd')]);
        } else {
            Articles::insert(['title' => $title, 'content' => $content, 'time' => time(), 'date' => date('Ymd')]);
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