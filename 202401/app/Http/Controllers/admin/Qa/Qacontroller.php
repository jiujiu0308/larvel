<?php

namespace App\Http\Controllers\Admin\Qa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Qa\Qa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Qacontroller extends Controller
{
    public function list()
    {
        $list = Qa::get();// get():取全部 first():取第一個
        return view("admin.qa.list", compact("list")); // compact()將資料丟入網頁
    }

    public function add()
    {
        return view("admin.qa.add");
    }

    public function insert(Request $req)
    {
        $qa = New Qa();
        $qa->title = $req->title;
        $qa->content = $req->content;
        $qa->save();

        Session::flash("message", "已新增");
        // flash()代表顯示一次而已
        return redirect("/admin/qa/list");
    }

    public function edit(Request $req)
    {
        // find:在全部的qa中尋找，$req->id:傳進來的id
        // 相當於 select * from qa where id = xxx
        $qa = Qa::find($req->id);

        // compact:將資料傳到網頁中
        return view("admin.qa.edit" ,compact("qa"));

    }

    public function update(Request $req)
    {
        $qa = Qa::find($req->id);
        $qa->title = $req->title;
        $qa->content = $req->content;
        $qa->save();

        Session::flash("message", "已更改");

        return redirect("/admin/qa/list");
    }

    public function delete(Request $req)
    {
        Qa::destroy($req->id);

        Session::flash("message", "已刪除");

        return redirect("/admin/qa/list");
    }
}
