<?php
// api為給外部呼叫用的網址

use App\Http\Controllers\Front\FrontPrizeController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontQaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// 當我呼叫api的qa/list使用FrontQaController的list的方法
Route::get("/qa/list",[FrontQaController::class,"list"]);

Route::get("/prize/list",[FrontPrizeController::class,"getlist"]);

Route::get("/product/list",[FrontProductController::class,"productlist"]);