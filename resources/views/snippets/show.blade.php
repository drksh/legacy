@extends('layouts.master')

@section("content")
    <div id="snippets" class="row show">
        <div class="col-md-12">

        <h1>{{ $snippet->title }}</h1>

        <textarea id="the-editor" data-id="{{ $snippet->mode }}">{{ $snippet->body }}</textarea>

        </div>
    </div>
@stop
