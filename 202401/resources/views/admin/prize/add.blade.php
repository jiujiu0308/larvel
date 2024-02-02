<form method="post" action="insert" enctype="multipart/form-data">
    <!-- enctype="multipart/form-data" form裡加這個才能上傳圖片 -->
    {{ csrf_field() }} <!-- csrf_field()授予自己網站合法權限可以新增東西 -->
    獎項：<input type="text" name="title"><br>
    名額：<input type="text" name="num"><br>
    內容：<input type="text" name="content"><br>
    圖片：<input type="file" name="photo"><br><br>
    <input type="submit" value="確定">
</form>