<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:42
 */
class HomeController extends BaseController {

    public function home() {
        $limit = config('common.page_num');
        $page = (int)get('page', 1);
        $count = Articles::where('status', 1)->count();

        $this->view = View::make('home/home')->with('article', Articles::where('status', 1)->offset(($page - 1) * $limit)->limit($limit)->get())->paginate($page, $limit, $count, 'home');
    }
}