@extends('layouts.app')

@section('content')
    
    <h1>errors</h1>

    @if (count($errors) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>error-messages</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($errors as $error)
                <tr>
                    <td>{{ $error->id }}</td>
                    <td>{{ $error->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
                    
    {{-- メッセージ作成ページへのリンク --}}
    {!! link_to_route('errors.create', '新規エラーの投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection