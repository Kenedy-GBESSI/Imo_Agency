<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as UserPropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$regexProperty = '[0-9]+';
$regexSlug = '[a-z0-9\-]+';

Route::get('/login',function (){
   return view('auth.login');
})->name('auth.login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class,'logout'])->name('auth.logout')->middleware('auth');



Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/biens', [UserPropertyController::class,'index'])->name('property.index');
Route::get('/biens/{slug}-{property}',[UserPropertyController::class,'show'])->name('property.show')->where([
    'slug' => $regexSlug,
    'property' => $regexProperty
]);

Route::post('/{property}/contact',[UserPropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $regexProperty
]);


Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function(){

    Route::resource('property',PropertyController::class)->except('show'); // Nous pouvons également faire ->only(['index','create','destroy',...])
    Route::delete('/{image}',[PropertyController::class,'deleteFile'])->name('image.delete');

    Route::post('/property/restore/{property}',[PropertyController::class, 'restoreProperty'])->name('property.restore');

    Route::resource('option',OptionController::class)->except('show');

});
