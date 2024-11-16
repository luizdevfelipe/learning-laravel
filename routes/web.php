<?php

use Illuminate\Support\Facades\Route;

Route::any('/', function () {
    return 'welcome';
});

Route::match(['get', 'post'], '/dashboard', function() {
    return 'dashboard';
});

Route::get('/users', fn() => ['luiz', 'felipe']
);

Route::redirect('/', 'dashboard');