<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prescription', function(){
    return view('prescription');
});

Route::get('/test-report', function(){
    return view('test-report');
});