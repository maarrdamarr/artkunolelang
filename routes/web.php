<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home');
});

Route::get('/news', function () {
    return view('public.news');
});

Route::get('/galeri', function () {
    return view('public.galeri');
});

Route::get('/artikel', function () {
    return view('public.artikel');
});
