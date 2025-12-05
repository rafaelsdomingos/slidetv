<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlideController;

Route::get('/', [SlideController::class, 'index']);
