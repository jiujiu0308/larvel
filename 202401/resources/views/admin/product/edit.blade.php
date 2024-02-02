<form method="post" action="../update"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $product->id }}">
    {{ csrf_field() }}
    獎項：<input type="text" name="title" value="{{ $product->title }}"><br>
    圖片：<input type="file" name="photo"><br>
    @if(!empty($product->photo))
    <img src="/images/product/{{ $product->photo }}" alt="" width="80">
    @endif
    <br>
    <input type="submit" value="確定">
</form>