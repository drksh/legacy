@extends('admin.layouts.master')

@section('content')

    <div class="col-md-12">
        <h1>User: <small>{{$user->username}}</small></h1>

        <p>
            {{ $user }}
        </p>
        <hr/>
    </div>

    {{-- Snippets list --}}
    <div class="col-md-4">
        <h1>Snippets</h1>
        @forelse($user->snippets->reverse() as $snippet)
            {{$snippet->title}} <br/>
        @empty
            <strong>None...</strong>
        @endforelse
    </div>

    {{-- Files list --}}
    <div class="col-md-4">
        <h1>Files</h1>
        @forelse($user->files->reverse() as $file)
            {{$file->title}} <br/>
        @empty
            <strong>None...</strong>
        @endforelse
    </div>

    {{-- Urls list --}}
    <div class="col-md-4">
        <h1>Urls</h1>
        @forelse($user->urls->reverse() as $url)
            {{$url->destination}} <br/>
        @empty
            <strong>None...</strong>
        @endforelse
    </div>
@stop
