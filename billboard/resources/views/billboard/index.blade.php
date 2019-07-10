@extends('layout.master')

@section('content')
    <h2>公告列表
        <a href="/billboard/create" class="btn btn-md btn-success pull-right">新增</a></h2>
    <p>顯示目前所有公告</p>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>標題</th>
            <th>內文</th>
            <th>發布時間</th>
            <th>功能</th>
        </tr>
        </thead>
        <tbody>
        @foreach($billboardList as $billboard)
            <tr>
                <td>{{$billboard['title']}}</td>
                <td>{{$billboard['content']}}</td>
                <td>{{$billboard['created_at']}}</td>
                <td>
            <span class="pull-right">
                <form method="post" action="/billboard/{{$billboard['id']}}">
                    <a href="/billboard/{{$billboard['id']}}/edit" class="btn btn-xs btn-info"><span
                                class="glyphicon glyphicon-pencil"></span> 查看</a> |
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> 刪除</button>
                </form>
            </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection