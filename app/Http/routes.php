<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/1', function () {
    require_once(base_path('/app/Observing.php'));
});

Event::listen('user.login', function () {
    var_dump('email notify');
});

Event::listen('user.login', function () {
    var_dump('do some report');
});

Route::get('/2', function () {
    Event::fire('user.login');
});

Route::get('/3', 'HomeController@getIndex');
