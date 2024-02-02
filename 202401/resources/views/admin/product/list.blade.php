<script>
    @if (Session::has("message"))
        alert("{{ Session::get('message') }}");
    @endif


    function doDelete(id) {
        if(confirm("確定刪除?"))
        {
            // 這種方式是危險的，要用post方式，否則別人能夠直接從網址那邊刪除
            location.href="delete/" + id;
        }
    }
</script>

<div><a href="add">新增</a></div>
@foreach($list as $data)
<div>產品：{{ $data->title }}
    @if(!empty($data->photo))
    &nbsp;&nbsp;圖片:<img src="/images/product/{{ $data->photo }}" alt="" width="80">
    @endif
    &nbsp;&nbsp;<a href="edit/{{ $data->id }}">修改</a>
    &nbsp;&nbsp;<a href="javascript:doDelete('{{ $data->id }}')">刪除</a><br><br>
</div>
@endforeach