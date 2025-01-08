<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return View::first(['home.welcome', 'dashboard'], ['name' => 'Luiz']);
});

Route::get('/name', function () {
    return View::make('home.welcome');
});

Route::get('/examples/if', function () {
    return View::make('examples.if', [
        'isAdmin' => false,
        'isEditor' => true,
        'items' => []
    ]);
});

Route::get('/examples/switch', function () {
    return View::make('examples.switch', [
        'role' => 'editor'
    ]);
});

Route::get('/examples/loops', function () {
    return View::make('examples.loops', [
        'users' => ['Luiz', 'Maria', 'João'],
        'tasks' => [],
        'numbers' => [1, 2, 3]
    ]);
});

Route::get('/examples/includes', function () {
    return View::make('examples.includes');
});
