@extends('layouts.master')

@section("content")
    <div id="files" class="row edit">
        <div class="col-md-12">

            {!! Form::model($file, ['route' => ['files.update', $file->id], 'method' => 'patch']) !!}

            @include('files.form')

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('files.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
