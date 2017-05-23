<?php
/**
 * User: Lee
 * Date: 2017/5/23
 * Time: 10:14
 */

use NoahBuscher\Macaw\Macaw;

Macaw::get('/test', function () {
    echo "成功！";
});

Macaw::get('/home', 'HomeController@home');

Macaw::get('/login', 'LoginController@index');

Macaw::post('/dologin', 'LoginController@login');

Macaw::get("/admin_index", 'AdminController@index');

Macaw::$error_callback = function () {
    throw new Exception("路由无匹配项 404 Not Found");
};

Macaw::dispatch();