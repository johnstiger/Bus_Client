<?php

use App\Http\Controllers\MailController;
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
Route::get('/dashboard/addClient','ClientController@Client');
Route::post('/dashboard/addClient/confirmed','ClientController@addClient');
Route::get('/dashboard/editClient/{id}','ClientController@edit');
Route::put('/dashboard/updateClient/{id}','ClientController@updateClient');
Route::delete('/dashboard/destroy/{id}','ClientController@destroy');

Route::get('/dashboard/AccessTokenForm','ClientController@getToken');
Route::get('/dashboard/getToken','ClientController@login');

Route::get('/dashboard/booking/send-email',[MailController::class,'sendEmail']);
Route::get('/dashboard/booking','ClientController@booking');


Route::get('/dashboard','ClientController@index')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
