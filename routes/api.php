<?php

use App\Http\Resources\KemenkoanCollection;
use App\Http\Resources\KementerianCollection;
use App\Models\Kemenkoan;
use App\Models\Kementerian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('kemenkoan', function () {
    return new KemenkoanCollection(Kemenkoan::paginate(10));
});
Route::get('kementerian', function () {
    return new KementerianCollection(Kementerian::paginate(10));
});
Route::get('post', function () {
    return new \App\Http\Resources\PostCollection(\App\Models\Post::where('is_active', true)->where('is_published', true)->paginate(10));
});
Route::get('post/{id}', function ($id) {
    return new \App\Http\Resources\PostResource(\App\Models\Post::find($id));
});
Route::get('kementerian/{id}', function ($id) {
    return new \App\Http\Resources\KementerianResource(\App\Models\Kementerian::find($id));
});
Route::get('kemenkoan/{id}', function ($id) {
    return new \App\Http\Resources\KemenkoanResource(\App\Models\Kemenkoan::find($id));
});
Route::get('kementerian/{id}/staff', function () {
    return \App\Http\Resources\StaffResource::collection(\App\Models\StaffDetail::where('kementerian_id', 1)->get());
});
Route::get('kemenkoan/{id}/staff', function () {
    return \App\Http\Resources\StaffResource::collection(\App\Models\StaffDetail::where('kemenkoan_id', 1)->get());
});
Route::get('kementerian/{id}/kedirjenan', function ($id) {
    return \App\Http\Resources\KedirjenanResource::collection(\App\Models\Kedirjenan::where('kementerian_id', $id)->get());
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
