<?php

namespace App\Http\Controllers;

class DocumentController
{
    public function index(): string
    {
        echo route('documents') . '<br>';
        return 'Documents';
    }
}