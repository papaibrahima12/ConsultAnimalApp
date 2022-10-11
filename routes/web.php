<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VetoController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/animal/index', [AnimalController::class, 'index'])->name('animal');
Route::get('/animal/showAll', [AnimalController::class, 'showAll'])->name('animalshowAll');
Route::get('/animal/add', [AnimalController::class, 'add']);
Route::post('/animal/store', [AnimalController::class, 'store']);
Route::post('/animal/update', [AnimalController::class, 'update']);
Route::get('/animal/show/{id}', [AnimalController::class, 'show'])->name('animalshow');
Route::get('/animal/delete/{id}', [AnimalController::class, 'delete'])->name('animaldelete');

Route::get('/veto/index', [VetoController::class, 'index'])->name('veto');
Route::get('/veto/showAll', [VetoController::class, 'showAll'])->name('vetoshowAll');
Route::get('/veto/add', [VetoController::class, 'add']);
Route::post('/veto/store', [VetoController::class, 'store']);
Route::post('/veto/update', [VetoController::class, 'update']);
Route::get('/veto/show/{id}', [VetoController::class, 'show'])->name('vetoshow');
Route::get('/veto/delete/{id}', [VetoController::class, 'delete'])->name('vetodelete');

Route::get('/consultation/index', [ConsultationController::class, 'index'])->name('consultation');
Route::get('/consultation/showAll', [ConsultationController::class, 'showAll'])->name('consultationshowAll');
Route::get('/consultation/add', [ConsultationController::class, 'add']);
Route::post('/consultation/store', [ConsultationController::class, 'store']);
Route::post('/consultation/update', [ConsultationController::class, 'update']);
Route::get('/consultation/show/{id}', [ConsultationController::class, 'show'])->name('consultationshow');
Route::get('/consultation/delete/{id}', [ConsultationController::class, 'delete'])->name('consultationdelete');
