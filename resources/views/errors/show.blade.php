@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <h1>id = {{ $error->content }} </h1>
                <tr>
                    <th>id</th>
                    <td>{{ $error->id }}</td>
                </tr>
                <tr>
                    <th>error-message</th>
                    <td>{{ $error->content }}</td>
                </tr>
                <tr>
                    <th>screenshot</th>
                    <td>{{ $error->screenshot }}</td>
                </tr>
                <tr>
                    <th>error-message</th>
                    <td>{{ $error->clearform }}</td>
                </tr>
                <tr>
                    <th>url</th>
                    <td>{{ $error->url }}</td>
                </tr>
                </table>
                {{-- エラー編集ページへのリンク --}}
            {!! link_to_route('errors.edit', 'edit', ['error' => $error->id], ['class' => 'btn btn-light']) !!}
                {{-- エラー削除フォーム --}}
            {!! Form::model($error, ['route' => ['errors.destroy', $error->id], 'method' => 'delete']) !!}
            {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection