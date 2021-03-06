@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('errorlogs.errorlogs')
            </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>error-commit</h1>
                {{-- ユーザエラーページ一覧へのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection