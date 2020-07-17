<!--ここから「PHP/Laravel 11 課題4」より追記200709-->
<!--さらに「PHP/Laravel 13 課題4」より入力フォームを作成-->
{{--layouts/profile.blade.phpを読み込む--}}
@extends('layouts.profile')

{{--profile.blade.phpの@yield('title')に'プロフィールの新規作成'を埋め込む--}}
@section('title', 'プロフィールの新規作成')

{{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>Myプロフィール</h2>
        
        <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
          
          <!-- エラーがあればリストとして表示させる記述 -->
          @if (count($errors) > 0)
            <ul>
              @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
              @endforeach
            </ul>
          @endif
          
          <!--「old('〇〇')」はバリデーションで弾かれた際に、直前に入力していたものが入るヘルパ関数-->
          <div class="form-group row">
            <label class="col-md-2">氏名</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2">性別</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2">趣味</label>
            <div class="col-md-10">
              <textarea class="form-control" name="hobby" rows="3">{{ old('hobby') }}</textarea>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2">自己紹介欄</label>
            <div class="col-md-10">
              <textarea class="form-control" name="introduction" rows="12">{{ old('introduction') }}</textarea>
            </div>
          </div>
          
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="プロフィール入力を完了！">
          
        </form>
      </div>
    </div>
  </div>
@endsection