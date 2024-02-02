<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Qa\Qa;
use Illuminate\Http\Request;

class FrontQaController extends Controller
{
    public function list(){
        // get()、all()都是取全部資料
        // 等同於$list = Qa::all();
        $list = Qa::get();
        // 回傳$list資料以json格式儲存
        return response()->json($list);
    }
}