@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>A fatal error happened.</h1>

            <hr/>

            <p>
                Please try again or write me an
                <a href="https://github.com/jstoone/darkshare/issues">issue</a> if the problem persists.
            </p>

            <hr/>

            <p>
                <a class="btn btn-success" href="{{ route('snippets.create') }}">Create Snippet</a>
                <a class="btn btn-primary" href="{{ route('files.create') }}">Create File</a>
                <a class="btn btn-success" href="{{ route('urls.create') }}">Create URL</a>
            </p>
        </div>
    </div>

@stop
