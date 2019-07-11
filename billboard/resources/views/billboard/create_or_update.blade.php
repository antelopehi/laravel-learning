@extends('layout.master')

@section('content')
    <form class="form-horizontal"
          @if($type =='create')
          action="/billboard"
          method="post">
        @else
            action="/billboard/{{$id}}"
            method="put">
            @method('put')
        @endif

        @csrf
        <fieldset>
            <!-- Form Name -->
            <legend>
                {{($type =='create')?"建立新的公告":"修改公告"}}
            </legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">公告標題</label>
                <div class="col-md-8">
                    <input id="title" name="title" type="text"
                           placeholder="輸入公告標題(不可超過10字元)"
                           value="{{old('title')}}"
                           class="form-control input-md">
                </div>
            </div>
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="content">公告內文</label>
                <div class="col-md-4">
                    <textarea class="form-control" id="content" name="content">
                        {{old('content')}}
                    </textarea>
                </div>
            </div>
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="buttonOK">操作</label>
                <div class="col-md-8">
                    <button id="buttonOK" name="buttonOK" class="btn btn-success">確認</button>
                    <a href="/billboard" class="btn btn-md btn-danger pull-right">放棄</a></h2>
                </div>
            </div>

        </fieldset>
    </form>
@endsection