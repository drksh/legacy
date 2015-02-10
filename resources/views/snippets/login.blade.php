@extends('layouts.master')

@section("content")
    <div id="snippets" class="row create">
        <div class="col-md-12">

            <h1>Authenticate, please</h1>
            <h4>Snippet: {{ $snippet->title }}</h4>

            <hr/>

            {!! Form::open(['route' => ['snippets.auth', $snippet->id], 'method' => 'patch']) !!}

            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}

            <hr/>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('snippets.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
