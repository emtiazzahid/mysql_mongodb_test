<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  function () {
    return view('welcome');
});

Route::get('/email-logs', function () {
    return \App\Site::with(['emails.logs' => function ($q) {
        $q->limit(2);
    }])
        ->latest()
        ->limit(1)
        ->find(1)
        ->toArray();
});
