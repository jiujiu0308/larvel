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


@foreach($list as $data)
<div>標題：{{ $data->title }}
    &nbsp;&nbsp;<a href="edit/{{ $data->id }}">修改</a>
    &nbsp;&nbsp;<a href="javascript:doDelete('{{ $data->id }}')">刪除</a>
</div>
<div>內容：{{ $data->content }}</div>
@endforeach