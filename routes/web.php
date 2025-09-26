<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('welcome');

    $pid = getmypid();

    return 'ok PID: '.$pid;
});


Route::get('/increate-count', function () {
    $myService = App::make('MyService');
    $pid = getmypid();
    $myService->increment();

    return "Worker PID: $pid, Counter: {$myService->counter}";
});

