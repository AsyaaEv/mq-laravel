<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('components.auth.loginview');
})->name('login');

Route::get('/register', function () {
    return view('components.auth.registerview');
})->name('register');

Route::middleware(['web'])->group(function () {
    Route::get('/store/view/{id}', function ($id) {
        return view('components.storeview', ['id' => $id]);
    })->name('storeview');

    Route::get('/product/view/{id}', function ($id) {
        return view('components.productview', ['id' => $id]);
    })->name('productview');

    Route::get('/edit/product/{id}', function ($id) {
        return view('components.product.change-product', ['id' => $id]);
    })->name('editproduct');
});

Route::middleware('auth')->group(function () {
    Route::get('/store', function () {
        return view('components.create.store');
    })->name('store');

    Route::get('/mystore', function () {
        return view('components.mystore');
    })->name('mystore');

    Route::get('/editstore', function () {
        return view('components.editstore');
    })->name('editstore');

    Route::get('/editprofile', function () {
        return view('components.profile.edit-profile');
    })->name('editprofile');

    Route::get('/addproduct/{id}', function ($id) {
        return view('components.create.addproduct', ['id' => $id]);
    })->name('addproduct');
});
