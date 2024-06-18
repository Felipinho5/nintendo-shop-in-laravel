<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('usuario.loja');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.loja');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/loja', [UsuarioController::class, 'loja'])
    ->name('usuario.loja');

Route::get('/admin/loja', [AdminController::class, 'loja'])
    ->middleware(['auth', 'verified'])
    ->name('admin.loja');

Route::get('/admin/adicionar', [AdminController::class, 'adicionar'])
    ->middleware(['auth', 'verified'])
    ->name('admin.adicionar');

Route::put('/admin/inserir', [AdminController::class, 'inserir'])
    ->middleware(['auth', 'verified'])
    ->name('admin.inserir');

Route::get('/admin/editar/{produto}', [AdminController::class, 'editar'])
    ->middleware(['auth', 'verified'])
    ->name('admin.editar');

Route::get('/admin/deletar/{produto}', [AdminController::class, 'deletar'])
    ->middleware(['auth', 'verified'])
    ->name('admin.deletar');

Route::put('/admin/salvar/{produto}', [AdminController::class, 'salvar'])
    ->middleware(['auth', 'verified'])
    ->name('admin.salvar');