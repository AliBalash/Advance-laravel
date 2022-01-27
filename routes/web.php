<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//service provider for dependency Injection and manage class whit interface by service Container
Route::get('/pay', [\App\Http\Controllers\PayOrderController::class, 'store']);

//create and test View Composer whit method boot class AppServiceProvider and manage data and parameter send to view
Route::get('/cat/0', [\App\Http\Controllers\CategoryTestController::class, 'index0']);
Route::get('/cat/1', [\App\Http\Controllers\CategoryController::class, 'index1']);
Route::get('/cat/2', [\App\Http\Controllers\CategoryController::class, 'index2']);



//create login and register handle
Route::get('/log', [\App\Http\Controllers\Log::class, 'log']);
Route::post('/regist', [\App\Http\Controllers\Log::class, 'register'])->name('regist');
Route::post('/logg', [\App\Http\Controllers\Log::class, 'logg'])->name('logg');

//polymorphic Relationships
Route::get('test', function (){
    $user =\App\Models\Post::find(2);
//    $user->tags()->create([]);
//    $user->tags()->attach(3);
    dd($user->tags);
});

Route::get('/postcards', function (){

    $postcardservices = new \App\FacadesTest\PostCartSendingService('IR','4','6');
    $postcardservices->sendEmail('Hello my friend','test@test.com');

});
Route::get('/postcardsfacad', function (){

    //for test
//    \App\FacadesTest\TestFacades::havij();

    \App\FacadesTest\PostCart::sendEmail('hello my Facade','test@test.com');
});









