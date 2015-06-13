@extends('layouts.master')

@section("content")
    <div id="snippets" class="row edit">
        <div class="col-md-12">

            {!! Form::model($snippet, ['route' => ['snippets.update', $snippet->slug->slug], 'method' => 'patch']) !!}

            @include('snippets.form')

            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
            <a class="text-warning" href="{{ route('snippets.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
    </div>
@stop
