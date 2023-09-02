<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| Two types of route parameters
| 1. Required Paramater - Parameter that is passed to the URL
| 2. Optional Parameter - Parameter place (?) after the router parameter to make it optional
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample/{name?}', function ($name = "Jeram") {
    return "Hello Universe! Welcome $name!";
});

Route::get('/index', function () {

    $dateTime = now();

    return view('index',
     ['name' => 'Jeram',
    'dateTime' => $dateTime -> format('Y-m-d H:i:s')]);
});

Route::get('/students', [
    StudentController::class, 'index'
])->name('list');

Route::get('/students/create', [
    StudentController::class, 'create'
])->name('students.create');

Route::post('/students/store', [
    StudentController::class, 'store'
])->name('students.store');

Route::get('/students/show/{id}', [
    StudentController::class, 'show'
])->name('show');

Route::get('/students/edit/{id}', [
    StudentController::class, 'edit'
])->name('edit');

Route::put('/students/update/{id}',
[StudentController::class, 'update'])->name('update');

Route::delete('/students/destroy/{id}', [
    StudentController::class, 'destroy'
])->name('destroy');


// -------------------------------------------
Route::controller(AuthController::class)->group(function (){
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});