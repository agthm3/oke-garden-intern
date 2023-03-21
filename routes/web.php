<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [ProjectController::class, 'index'])->name('index_pages');
Route::post('/create', [ProjectController::class, 'store'])->name('store_project');
Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('edit_project');
Route::patch('/udpate/{project}', [ProjectController::class, 'update'])->name('update_project');
Route::delete('/delete/{project}', [ProjectController::class, 'destroy'])->name('delete_project');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
