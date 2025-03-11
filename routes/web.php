<?php

use App\Http\Controllers\InvitationRegistryController;
use App\Models\InvitationRegistry;
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

Route::get('/', function () {
    return view('invitation_registry');
});


Route::post('/invitation',[InvitationRegistryController::class,'store'])->name('invitation.store');
Route::get('/show_qrcode',[InvitationRegistryController::class,'show_qrcode'])->name('invitation.show_qrcode');
Route::get('/show_data',[InvitationRegistryController::class,'show_data'])->name('invitation.show_data');
Route::get('/show_all',[InvitationRegistryController::class,'show_all'])->name('invitation.show_all');
