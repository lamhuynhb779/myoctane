<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
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

Route::post('/cache-add', function () {
    $key = 'key_'.request()->input('key');
    $value = str_repeat('X', 2*1024*1024);
    $isSuccess = Cache::add($key, $value, now()->addHours(5));
    if ($isSuccess) {
        return 'success';
    }

    return 'fail';
});

Route::get('/cache-get', function () {
    $key = 'key_'.request()->input('key');
    $value = Cache::get($key);
    return 'value = '.$value;
});

