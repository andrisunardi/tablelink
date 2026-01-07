<?php

use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::any('', HomePage::class)->name('home');
