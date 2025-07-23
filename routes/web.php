<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-debug', function() {
    $message = "Debugging works!"; // Установите здесь точку останова!
    xdebug_break(); // Точка останова
    return response()->json(['status' => 'success', 'message' => $message]);
});

Route::get('/db-test', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Database connection is OK!';
    } catch (\Exception $e) {
        return '❌ Database connection failed: ' . $e->getMessage();
    }
});
