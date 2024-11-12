<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Kegiatan;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', Kegiatan::class)->name('home');
