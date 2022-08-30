<?php

use App\Http\Controllers\ContactController;
use App\Mail\SendContactForm;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Routing\RouteGroup;
use Illuminate\Routing\RouteUri;
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

//Proteger las rutas que esten autenticadas y verificado el email 
Route::group(["middleware" => ['auth', 'verified']], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/contact', [ContactController::class, "index"])->name("contact.index");
    Route::post('/contact', [ContactController::class, "send"])->name("contact.send"); 
    Route::get("/mailable/contact", function(){
        return new SendContactForm("Motivo","Mensaje");
    });
});
    
require __DIR__.'/auth.php';