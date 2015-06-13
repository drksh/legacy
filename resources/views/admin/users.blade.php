@extends('admin.layouts.master')

@section('content')

    <div class="col-md-12">
        <h1>User: <small>{{$user->username}}</small></h1>

        <hr/>
    </div>

    {{-- Snippets list --}}
    <div class="col-md-4">
        <h1>
            <a href="{{ route('admin.users.snippets', [$authcode, $user->username]) }}">
                Snippets
            </a>
        </h1>
        @forelse($user->snippets->reverse() as $snippet)
            <a href="{{ route('snippets.show', $snippet->slug->slug) }}">
                {{ $snippet->title }}
            </a>
            <br/>
        @empty
            <strong>None...</strong>
        @endforelse
    </div>

    {{-- Files list --}}
    <div class="col-md-4">
        <h1>
            <a href="{{ route('admin.users.files', [$authcode, $user->username]) }}">
                Files
            </a>
        </h1>
        @forelse($user->files->reverse() as $file)
            <a href="{{ route('files.show', $file->slug->slug) }}">
                {{$file->title}}
            </a>
            <br/>
        @empty
            <strong>None...</strong>
        @endforelse
    </div>

    {{-- Urls list --}}
    <div class="col-md-4">
        <h1>
            <a href="{{ route('admin.users.urls', [$authcode, $user->username]) }}">
                Urls
            </a>
        </h1>
        @forelse($user->urls->reverse() as $url)
            <a href="{{$url->destination}}">
                {{$url->destination}}
            </a>
            <br/>
        @empty
            <strong>None...</strong>
        @endforelse
    </div>
@stop
