<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LiveClassController;
use App\Http\Controllers\TryoutController;
use App\Http\Controllers\PTNController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\ForumController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome'); 
})->name('home'); 

Route::middleware('auth')->group(function () {
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');

    // PTN Route
    Route::get('/ptn', [PTNController::class, 'index'])->name('ptn.index');

    // Sertifikat Routes
    Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
    Route::get('/sertifikat/generate', [SertifikatController::class, 'generate'])->name('sertifikat.generate');

    // Tryout Routes
    Route::prefix('tryout')->name('tryout.')->group(function () {
        Route::get('/', [TryoutController::class, 'index'])->name('index');
        Route::post('/start/{tryoutType}', [TryoutController::class, 'start'])->name('start');
        Route::get('/session/{session}/instructions', [TryoutController::class, 'instructions'])->name('instructions');
        Route::post('/session/{session}/start-subtest', [TryoutController::class, 'startSubtest'])->name('start-subtest');
        Route::get('/session/{session}/subtest/{subtestAnswer}', [TryoutController::class, 'showSubtest'])->name('subtest');
        Route::post('/session/{session}/subtest/{subtestAnswer}/submit', [TryoutController::class, 'submitSubtest'])->name('submit-subtest');
        Route::get('/session/{session}/results', [TryoutController::class, 'results'])->name('results');
    });
});

Route::view('/bank-soal', 'banksoal')->name('banksoal');

Route::prefix('forum')->name('forum.')->group(function () {
    Route::get('/', [ForumController::class, 'index'])->name('index');
    
    // Protected routes that require authentication
    Route::middleware('auth')->group(function () {
        Route::get('/create', [ForumController::class, 'create'])->name('create');
        Route::post('/', [ForumController::class, 'store'])->name('store');
    });

    // This needs to be after /create to prevent it from catching /create requests
    Route::get('/{topic}', [ForumController::class, 'show'])->name('show');
    
    // Protected routes that require authentication for specific topics
    Route::middleware('auth')->group(function () {
        Route::get('/{topic}/edit', [ForumController::class, 'edit'])->name('edit');
        Route::put('/{topic}', [ForumController::class, 'update'])->name('update');
        Route::delete('/{topic}', [ForumController::class, 'destroy'])->name('delete');
        Route::post('/{topic}/comments', [ForumController::class, 'storeComment'])->name('comments.store');
    });
});

Route::view('/video-pembelajaran', 'video-pembelajaran')->name('video.pembelajaran');

Route::middleware('auth')->get('/live-class', [LiveClassController::class, 'index'])->name('live-class.index');