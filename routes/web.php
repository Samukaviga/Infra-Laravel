<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
        
    if (Auth::check()) {
       
        return redirect()->route('principal');
    }

    return view('auth.login');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Principal

Route::get('/principal', [PrincipalController::class, 'index'])->middleware(['auth', 'verified'])->name('principal');
Route::get('/alterarSenha', [PrincipalController::class, 'alterarSenha']);
Route::get('/adicionarEvento', [PrincipalController::class, 'adicionarEvento']);
Route::get('/adicionarReuniao', [PrincipalController::class, 'adicionarReuniao']);
Route::get('/adicionarNoticia', [PrincipalController::class, 'adicionarNoticia']);
Route::get('/perfil', [PrincipalController::class, 'perfil']); 

Route::post('/perfil/foto', [PrincipalController::class, 'perfilFoto']); 

Route::post('/adicionarReuniao', [PrincipalController::class, 'adicionarReuniaoPost']);
Route::post('/adicionarEvento', [PrincipalController::class, 'adicionarEventoPost']);
Route::post('/adicionarNoticia', [PrincipalController::class, 'adicionarNoticiaPost']);

//Blog

Route::get('/blog', [PrincipalController::class, 'blog']);
Route::get('/blog/detalhes/{id}', [PrincipalController::class, 'blogDetalhes']);
Route::get('/blog/editar', [PrincipalController::class, 'blogEditar']);
Route::get('/blog/novo', [PrincipalController::class, 'blogNovo']);

Route::delete('/blog/deletar/{id}', [PrincipalController::class, 'blogDeletar']);

Route::post('/blog/novo', [PrincipalController::class, 'blogNovoPost']);

// Recursos Humanos

Route::get('/recursos-humanos', [PrincipalController::class, 'recursosHumanos']);
Route::get('/recursos-humanos/novo', [PrincipalController::class, 'recursosHumanosNovo']);
Route::get('/recursos-humanos/editar', [PrincipalController::class, 'recursosHumanosEditar']);
Route::get('/recursos-humanos/detalhes', [PrincipalController::class, 'recursosHumanosDetalhes']);
Route::get('/recursos-humanos/detalhes', [PrincipalController::class, 'recursosHumanosDetalhes']);



Route::middleware('auth')->group(function () {
   
 

});


require __DIR__.'/auth.php';
