<?php

namespace App\Http\Controllers\Admin\Prize;

use App\Http\Controllers\Controller;
use App\Models\Admin\Prize\Prize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PrizeController extends Controller
{
    public function list(){
        $list = Prize::get();
        // $list、compact("list")跟list.blade.php裡的@foreach($list as $data)要一致
        return view("admin.prize.list" , compact("list"));
    }

    public function add(){
        return view("admin.prize.add");
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
        if(!file_exists("images/prize")){
            // 建立一個資料夾, 權限777:可讀取, 寫入, 執行
            mkdir("images/prize" , 0777);
        }

        $photo->move("images/prize", $photoName);

        $prize = new Prize();
        $prize->title = $req->title;
        $prize->num = $req->num;
        $prize->content = $req->content;
        $prize->photo = $photoName;
        $prize->save();

        // 記得session要用選的 use Illuminate\Support\Facades\Session
        Session::flash("message" , "已新增");
        return redirect("/admin/prize/list");
    }

    public function edit(Request $req){

        // select * from prize where id = $req->id
        // find寫法是僅限於id
        $prize = Prize::find($req->id);

        return view("admin.prize.edit" , compact("prize"));
    }

    public function update(Request $req){

        

        // select * from prize where id = $req->id

        $prize = Prize::find($req->id);
        $photo = $req->photo;
        // 如果有上傳圖片
        if(!empty($req->photo)){
            // 將原有圖檔從資料夾中刪除
            @unlink("images/prize/" . $prize->photo);
            // 時間序列
            $times = explode(" ", microtime());

            // 圖片檔名為時間序列轉年月日時分秒加上副檔名(變更上傳檔名)
            $photoName = strftime("%Y_%m_%d_%H_%M_%S_" , $times[1]).substr($times[0], 2, 3).".".$photo->extension();
            $photo->move("images/prize", $photoName);
        }else{
            // 如果沒有上傳, 則檔名為原有檔名
            $photoName = $prize->photo;
        }

        $prize->title = $req->title;
        $prize->num = $req->num;
        $prize->content = $req->content;
        $prize->photo = $photoName;
        $prize->save();

        Session::flash("message" , "已更新");
        return redirect("/admin/prize/list");
    }

    public function delete(Request $req){
        Prize::destroy($req->id);

        Session::flash("message" , "已刪除");
        return redirect("/admin/prize/list");
    }
}
