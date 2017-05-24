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
            ->with('article', Articles::all());
    }

    public function add() {
        $title = param('title');
        $content = param('content');

        if (empty($title) || empty($content)) {
            redirect('admin-index');
        }

        $article = new Articles;

        $article->title = $title;
        $article->content = $content;
        $article->date = date('Ymd');
        $article->time = time();

        $article->save();
    }
}