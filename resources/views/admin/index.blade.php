@extends('admin.layouts.master')


@section('content')

<div class="col-md-12">
    <h1>Administration: User top {{ count($snippetsUsers) }}</h1>

    <hr/>
</div>

{{-- Snippets Users --}}
<div class="col-md-4">
    <h2>Snippets</h2>
    @include('admin.partials.user-list', ['users' => $snippetsUsers, 'count' => 'snippets'])
</div>

{{-- Files Users --}}
<div class="col-md-4">
    <h2>Files</h2>
    @include('admin.partials.user-list', ['users' => $filesUsers, 'count' => 'files'])
</div>

{{-- Urls Users --}}
<div class="col-md-4">
    <h2>Urls</h2>
    @include('admin.partials.user-list', ['users' => $urlsUsers, 'count' => 'urls'])
</div>

@stop
