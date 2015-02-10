@extends('layouts.master')

@section("content")
    <div id="snippets" class="row create">
        <div class="col-md-12">
            {!! Form::open(['route' => 'snippets.store']) !!}

            @include('snippets.form')

            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                <p class="help-block">NOTE: You may only set the password once. And it cannot be reset.</p>
            </div>

            <hr/>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('snippets.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
