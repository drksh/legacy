@extends('layouts.master')

@section("content")
    <div id="urls" class="row create">
        <div class="col-md-12">
            {!! Form::open(['route' => 'urls.store']) !!}

            @include('urls.form')

            <div class="form-group">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                <p class="help-block">NOTE: You may only set the password once. And it cannot be reset.</p>
            </div>

            <hr/>

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
