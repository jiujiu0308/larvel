<?php
// web為給內部呼叫用的網址

use App\Http\Controllers\Admin\Prize\PrizeController;
use App\Http\Controllers\admin\Product\ProductController;
use App\Http\Controllers\Admin\Qa\Qacontroller;
use Illuminate\Support\Facades\Route;

Route::group(["prefix"=>"admin/qa"], function(){
    Route::get("/", [QaController::class, "list"]);
    Route::get("list", [QaController::class, "list"]);
    Route::get("add", [QaController::class, "add"]);
    Route::post("insert", [QaController::class, "insert"]);
    Route::get("edit/{id?}", [QaController::class,"edit"]);
    Route::post("update", [QaController::class,"update"]);
    Route::get("delete/{id}", [QaController::class,"delete"]);

});

Route::group(["prefix"=>"admin/prize"], function(){
    Route::get("/", [PrizeController::class, "list"]);
    Route::get("list", [PrizeController::class, "list"]);
    Route::get("add", [PrizeController::class, "add"]);
    Route::post("insert", [PrizeController::class, "insert"]);
    Route::get("edit/{id?}", [PrizeController::class,"edit"]);
    Route::post("update", [PrizeController::class,"update"]);
    Route::get("delete/{id}", [PrizeController::class,"delete"]);

});

Route::group(["prefix"=>"admin/product"], function(){
    Route::get("/", [ProductController::class, "list"]);
    Route::get("list", [ProductController::class, "list"]);
    Route::get("add", [ProductController::class, "add"]);
    Route::post("insert", [ProductController::class, "insert"]);
    Route::get("edit/{id?}", [ProductController::class,"edit"]);
    Route::post("update", [ProductController::class,"update"]);
    Route::get("delete/{id}", [ProductController::class,"delete"]);

});


/*
    Route::get("/admin/qa/list", [QaController::class, "list"]);
    Route::get("/admin/qa/add", [QaController::class, "add"]);
    // 網址："/admin/qa/add"
    // 程式：QaController
    // 程式的方法："add"
    Route::post("/admin/qa/insert", [QaController::class, "insert"]);
    // {}:參數  {id}:參數名稱為id {id?}:有?，id這個參數可能，也可能沒有
    Route::get("/admin/qa/edit/{id?}", [QaController::class,"edit"]);
    Route::post("/admin/qa/update", [QaController::class,"update"]);
    Route::get("/admin/qa/delete/{id}", [QaController::class,"delete"]);
*/