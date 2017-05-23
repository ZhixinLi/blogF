<?php

/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:42
 */
class HomeController extends AuthController {

    public function home() {
        $this->view = View::make('home/home')->with('article', Articles::all());
    }
}