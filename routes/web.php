<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('costumer.layouts.master');
})->name('home');


Route::get('/menu', function () {
    return view('costumer.menu');
})->name('menu');

Route::get('/cart', function () {
    return view('costumer.cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('costumer.checkout');
})->name('checkout');