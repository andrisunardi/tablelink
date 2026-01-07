<?php

use App\Livewire\HomePage;
use App\Livewire\RegistrationPage;
use Illuminate\Support\Facades\Route;

Route::any('', HomePage::class)->name('home');
Route::any('registration', RegistrationPage::class)->name('registration');
