<script>
    @if (Session::has("message"))
    alert("{{ Session::get('message') }}");
    @endif
</script>

<form method="post" action="../update">
    <input type="hidden" name="id" value="{{ $qa->id }}">
    {{ csrf_field() }}
    標題：<input type="text" name="title" value="{{ $qa->title }}"><br>
    內容：<textarea name="content" cols="80" rows="5">{{ $qa->content }}</textarea><br>
    <input type="submit" value="確定">
</form>