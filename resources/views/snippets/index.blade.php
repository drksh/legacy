@extends('layouts.master')

@section("content")

    <form action="{{ route('snippets.create') }}" method="POST">

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Title">
        </div>

        <button class="btn btn-success" href="#" type="button" data-id="html">HTML</button>
        <button class="btn btn-success" href="#" type="button" data-id="javascript">Javascript</button>
        <button class="btn btn-success" href="#" type="button" data-id="css">CSS</button>
        <button class="btn btn-success" href="#" type="button" data-id="markdown">Markdown</button>
        <button class="btn btn-success" href="#" type="button" data-id="php">PHP</button>
        <button class="btn btn-success" href="#" type="button" data-id="sass">SASS</button>

        <hr/>

        <textarea name="body" id="the-editor" style="display: none;">var lol = 'lol';</textarea>

    </form>
@stop
