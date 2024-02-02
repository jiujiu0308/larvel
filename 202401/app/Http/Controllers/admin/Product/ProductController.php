<?php

namespace App\Http\Controllers\admin\Product;

use App\Http\Controllers\Controller;
use App\Models\admin\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function list(){
        $list=Product::get();
        return view("admin.product.list", compact("list"));
    }

    public function add(){
        return view("admin.product.add");
    }

    public function insert(Request $req){
        // 時間序列
        $times = explode(" ", microtime());
        $photo = $req->photo;
        // 圖片檔名為時間序列轉年月日時分秒加上副檔名
        $photoName = strftime("%Y_%m_%d_%H_%M_%S_" , $times[1]).substr($times[0], 2, 3).".".$photo->extension();
        
        // 如果public資料夾下沒有images資料夾
        if(!file_exists("images")){
            // 建立一個資料夾, 權限777:可讀取, 寫入, 執行
            mkdir("images" , 0777);
        }

        // 如果public/images資料夾下沒有prize資料夾
        if(!file_exists("images/product")){
            // 建立一個資料夾, 權限777:可讀取, 寫入, 執行
            mkdir("images/product" , 0777);
        }

        $photo->move("images/product", $photoName);

        $product = new Product();
        $product->title = $req->title;
        $product->photo = $photoName;
        $product->save();

        // 記得session要用選的 use Illuminate\Support\Facades\Session
        Session::flash("message" , "已新增");
        return redirect("/admin/product/list");

    }

    public function edit(Request $req){
        $product = Product::find($req->id);
        return view("admin.product.edit" , compact("product"));
    }

    public function update(Request $req){
        $product = Product::find($req->id);
        $photo = $req->photo;
        // 如果有上傳圖片
        if(!empty($req->photo)){
            // 將原有圖檔從資料夾中刪除
            @unlink("images/product/" . $product->photo);
            // 時間序列
            $times = explode(" ", microtime());

            // 圖片檔名為時間序列轉年月日時分秒加上副檔名(變更上傳檔名)
            $photoName = strftime("%Y_%m_%d_%H_%M_%S_" , $times[1]).substr($times[0], 2, 3).".".$photo->extension();
            $photo->move("images/product", $photoName);
        }else{
            // 如果沒有上傳, 則檔名為原有檔名
            $photoName = $product->photo;
        }

        $product->title = $req->title;
        $product->photo = $photoName;
        $product->save();

        Session::flash("message" , "已更新");
        return redirect("/admin/product/list");

    }

    public function delete(Request $req){
        Product::destroy($req->id);

        Session::flash("message" , "已刪除");
        return redirect("/admin/product/list");
    }
}
