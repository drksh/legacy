@extends('layouts.master')

@section("content")
    <div id="files" class="row edit">
        <div class="col-md-12">

            {!! Form::model($file, ['route' => ['files.update', $file->slug->slug], 'method' => 'patch']) !!}

            @include('files.form')

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop
