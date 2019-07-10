<!DOCTYPE html>
<html>
<head>
    <title>laravel練習(公告系統)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
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
</div>
<script>
</script>
</body>
</html>