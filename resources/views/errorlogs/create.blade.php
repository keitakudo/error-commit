@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>new-error</h1>
            {!! Form::model($errorlog, ['route' => 'errorlogs.store']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'error-title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('screenshot', 'screenshot:') !!}
                    {!! Form::text('screenshot', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('process', 'process:') !!}
                    {!! Form::text('process', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('url', 'url:') !!}
                    {!! Form::text('url', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('commit', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection