@extends('layouts.master')

@section("content")
    <div id="urls" class="row login">
        <div class="col-md-12">

            <h1>Authenticate, please</h1>

            <hr/>

            {!! Form::open(['route' => ['urls.auth', $url->slug->slug], 'method' => 'post']) !!}

            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

            <hr/>

            {!! Form::submit('Bring me there', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('urls.create') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
