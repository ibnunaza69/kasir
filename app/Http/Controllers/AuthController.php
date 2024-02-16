<?php

use Illuminate\Http\Request;

// Pastikan untuk mengimpor AuthController Anda
use App\Http\Controllers\AuthController;

// Buat instance baru dari kernel HTTP Anda
$kernel = app()->make(Illuminate\Contracts\Http\Kernel::class);

// Tangkap permintaan saat ini
$request = Request::capture();

// Tangani permintaan dengan kernel dan kirim respons
$response = $kernel->handle($request)->send();

// Setelah menangani permintaan, terminasi skrip dan kirim respons ke browser
$kernel->terminate($request, $response);

?>
