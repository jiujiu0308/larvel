<form method="post" action="../update"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $prize->id }}">
    {{ csrf_field() }}
    獎項：<input type="text" name="title" value="{{ $prize->title }}"><br>
    名額：<input type="text" name="num" value="{{ $prize->num }}"><br>
    內容：<input type="text" name="content" value="{{ $prize->content }}" size="80"><br>
    圖片：<input type="file" name="photo"><br>
    @if(!empty($prize->photo))
    <img src="/images/prize/{{ $prize->photo }}" alt="" width="80">
    @endif
    <br>
    <input type="submit" value="確定">
</form>