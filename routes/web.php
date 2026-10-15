
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);

Route::get('/login', function () {
    return redirect('/?login=1');
})->name('login');

Route::post('/login', [UserController::class, 'login'])
    ->name('login.authenticate');

Route::post('/registrar', [UserController::class, 'registrar']);

Route::middleware('auth')->group(function () {

    Route::post('/logout', [UserController::class, 'logout']);

    Route::post('/posts', [PostController::class, 'store']);

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy');

});
