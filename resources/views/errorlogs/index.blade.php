@extends('layouts.app')

@section('content')

    <h1>errorlogs</h1>

    @if (count($errors) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>error-title</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($errorlogs as $errorlog)
                <tr>
                    <td>{!! link_to_route('errorlogs.show', $errorlog->id, ['errorlog' => $errorlog->id]) !!}</td>
                    <td>{{ $errorlog->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- メッセージ作成ページへのリンク --}}
    {!! link_to_route('errorlogs.create', 'new-error', [], ['class' => 'btn btn-primary']) !!}


@endsection