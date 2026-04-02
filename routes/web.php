<?php


use Illuminate\Support\Facades\Route;

Route::get('/', fn () => \Carbon\Carbon::parse("2026-03-30 08:51:47")->format('Y-m-d H:i'));
