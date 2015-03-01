@extends('layouts.master')

@section("content")
    <div id="urls" class="row login">
        <div class="col-md-12">

            <h1>Authenticate, please</h1>
            <h4>Url: {{ $url->title }}</h4>

            <hr/>

            {!! Form::open(['route' => ['urls.auth', $url->id], 'method' => 'post']) !!}

            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

            <hr/>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('urls.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
