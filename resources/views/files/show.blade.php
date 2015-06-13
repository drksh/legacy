@extends('layouts.master')

@section("content")
    <div id="files" class="row show">
        <div class="col-md-12 text-center">

        <h1>{{ $file->title }}</h1>

        <p>
            <strong>Created at:</strong> {{ $file->updated_at }}
        </p>

        <a class="btn btn-success" href="{{ route('files.download', [$file->slug->slug])}}">
            Download
        </a>

        </div>
    </div>
@stop
