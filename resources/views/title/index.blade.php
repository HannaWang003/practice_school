@extends('layouts.app');
@section('content')
    <table class="yel" style="margin:auto;width:100%;">
        <th>網站標題</th>
        <th>替代文字</th>
        <th>顯示</th>
        <th>刪除</th>
        <th></th>
        @foreach ($titles as $title)
            <tr>
                <td><img src="./img/{{ $title->img }}" style="width:300px;height:30px"></td>
                <td><input type="text" nmae="text" value="{{ $title->text }}"></td>
                <td><input type="checkbox" nmae="sh[]" value=""></td>
                <td><input type="checkbox" nmae="del[]" value=""></td>
                <td><input type="button" value="更新圖片"
                        onclick="op('#cover','#cvr','./model/upload.php?do=title&id={{ $title->id }}')"></td>
            </tr>
        @endforeach
    </table>
@endsection
