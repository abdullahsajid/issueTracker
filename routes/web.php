<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\opertionControl;



Route::get('loginUI',[opertionControl::class,'index'])->name('loginUI');
Route::post('login',[opertionControl::class,'login'])->name('login');
Route::get('registerUI',[opertionControl::class,'register_view'])->name('registerUI');
Route::post('register',[opertionControl::class,'register'])->name('register');


Route::get('main',[opertionControl::class,'mainPage'])->name('main')->middleware('customAuth');
Route::get('logout',[opertionControl::class,'logout'])->name('logout')->middleware('customAuth');
Route::post('create',[opertionControl::class,'createProject'])->middleware('customAuth');
Route::get('main',[opertionControl::class,'getUserProjects'])->name('userProjects')->middleware('customAuth');
Route::get('issue',[opertionControl::class,'issuePage'])->middleware('customAuth');
Route::get("issue/{projTitle}/{id}",[opertionControl::class,'issuePanel'])->middleware('customAuth');
Route::post('issue/{projTitle}/{id}',[opertionControl::class,'createIssues'])->middleware('customAuth');




