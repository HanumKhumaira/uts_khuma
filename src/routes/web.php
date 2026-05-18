<?php

use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\ProjectIndex;
use App\Livewire\ProjectShow;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');

Route::get('/projects', ProjectIndex::class)->name('projects.index');
Route::get('/projects/{project:slug}', ProjectShow::class)->name('projects.show');

Route::get('/contact', ContactPage::class)->name('contact');