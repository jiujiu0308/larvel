<script>
    @if (Session::has("message"))
    alert("{{ Session::get('message') }}");
    @endif
</script>

<form method="post" action="insert">
    {{ csrf_field() }} <!-- csrf_field()授予自己網站合法權限可以新增東西 -->
    標題：<input type="text" name="title"><br>
    內容：<textarea name="content" cols="80" rows="5"></textarea><br>
    <input type="submit" value="確定">
</form>