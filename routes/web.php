<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('inicio');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::resource('tarea', TareaController::class)->middleware('auth');

Route::post('tarea/{tarea}/actualizar-usuarios', [TareaController::class, 'actualizarTareaUsuarios'])
    ->name('tarea.actualizar-usuarios')
    ->middleware(['auth']);

//Rutas para listado y carga de archivos
Route::get('archivo', function() {
    $archivos = App\Archivo::all();
    return view('archivos.archivoIndex', compact('archivos'));
});
Route::get('archivo/formulario', function() {
    return view('archivos.archivoForm');
});

Route::post('archivo/cargar', [ArchivoController::class, 'upload'])->name('archivo.upload');

Route::get('archivo/{archivo}/descargar', [ArchivoController::class, 'download'])->name('archivo.download');

Route::post('archivo/{archivo}/borrar', [ArchivoController::class, 'delete'])->name('archivo.delete');

Route::get('/registrar', [AuthController::class, 'showRegistrar'])->name('show.registrar');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/registrar', [AuthController::class, 'registrar'])->name('registrar');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
