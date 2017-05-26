<?php
/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:14
 */

use NoahBuscher\Macaw\Macaw;

Macaw::get('/test', function () {
    echo config('common.page_num');
});

Macaw::get('/home', 'HomeController@home');

Macaw::get('/login', 'LoginController@index');

Macaw::post('/dologin', 'LoginController@login');

Macaw::get("/admin-index", 'AdminController@index');

Macaw::post("/admin-add", 'AdminController@add');

Macaw::post("/admin-modify", 'AdminController@modify');

Macaw::post("/admin-status", 'AdminController@status');

Macaw::post("/admin-logout", 'AdminController@logout');

Macaw::$error_callback = function () {
    redirect_404();
};

Macaw::dispatch();