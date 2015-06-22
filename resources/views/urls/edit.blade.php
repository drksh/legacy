@extends('layouts.master')

@section("content")
    <div id="urls" class="row edit">
        <div class="col-md-12">

            {!! Form::model($url, ['route' => ['urls.update', $url->slug->slug], 'method' => 'patch']) !!}

            @include('urls.form')

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
