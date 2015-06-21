@extends('layouts.master')

@section("content")
    <div id="snippets" class="row login">
        <div class="col-md-12">

            <h1>Authenticate, please</h1>
            <h4>Snippet: {{ $snippet->title }}</h4>

            <hr/>

            {!! Form::open(['route' => ['snippets.auth', $snippet->slug->slug], 'method' => 'post']) !!}

            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

            <hr/>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
