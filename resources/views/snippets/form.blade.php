@include('layouts.partials.errors')

{!! Form::hidden('mode', null, null) !!}

<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
</div>

<div class="js-mode-changers">
    <button class="btn btn-info btn-sm" href="#" type="button" data-id="htmlmixed">HTML</button>
    <button class="btn btn-info btn-sm" href="#" type="button" data-id="sass">SASS</button>
    <button class="btn btn-info btn-sm" href="#" type="button" data-id="php">PHP</button>
    <button class="btn btn-info btn-sm" href="#" type="button" data-id="javascript">Javascript</button>
    <button class="btn btn-info btn-sm active" href="#" type="button" data-id="markdown">Markdown</button>
</div>

<hr/>

{!! Form::textarea('body', null, ['id' => 'the-editor']) !!}

<hr/>

