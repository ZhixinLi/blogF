<?php
/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:14
 */

use NoahBuscher\Macaw\Macaw;

Macaw::get('/home', 'HomeController@home');

Macaw::get('/login', 'LoginController@index');

Macaw::post('/dologin', 'LoginController@login');

Macaw::get("/admin-index", 'AdminController@index');

Macaw::post("/admin-add", 'AdminController@add');

Macaw::$error_callback = function () {
    redirect_404();
};

Macaw::dispatch();