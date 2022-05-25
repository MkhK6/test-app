<?php

use App\Models\Message;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\MessageResource;

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
    $data = MessageResource::collection(Message::limit(5)->get());
    return view('home', ['data' => $data]);
});

Auth::routes();
Route::post('message', [App\Http\Controllers\MessageController::class, 'send']);

Route::get('message', [App\Http\Controllers\MessageController::class, 'get']);
Route::get('countMessages', [App\Http\Controllers\MessageController::class, 'countMessages']);
