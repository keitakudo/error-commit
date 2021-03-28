@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <h1>{{ $errorlog->title }} </h1>
                <tr>
                    <th>id</th>
                    <td>{{ $errorlog->id }}</td>
                </tr>
                <tr>
                    <th>error-title</th>
                    <td>{{ $errorlog->title }}</td>
                </tr>
                <tr>
                    <th>screenshot</th>
                    <td>{{ $errorlog->screenshot }}</td>
                </tr>
                <tr>
                    <th>error-message</th>
                    <td>{{ $errorlog->process }}</td>
                </tr>
                <tr>
                    <th>url</th>
                    <td>{{ $errorlog->url }}</td>
                </tr>
                </table>
                {{-- エラー編集ページへのリンク --}}
            {!! link_to_route('errorlogs.edit', 'edit', ['errorlog' => $errorlog->id], ['class' => 'btn btn-light']) !!}
                {{-- エラー削除フォーム --}}
            {!! Form::model($errorlog, ['route' => ['errorlogs.destroy', $errorlog->id], 'method' => 'delete']) !!}
            {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection