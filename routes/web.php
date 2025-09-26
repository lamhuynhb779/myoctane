<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('welcome');

    $pid = getmypid();

    return 'ok PID: '.$pid;
});
