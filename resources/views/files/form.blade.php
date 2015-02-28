@include('layouts.partials.errors')

{!! Form::hidden('mode', null, null) !!}

<div class="form-group">
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
</div>

<hr/>

<div class="file-upload">
    <label for="file">
        Upload File
    </label>
    {!! Form::file('path', ['id' => 'file']) !!}
</div>
<p class="help-block">NOTE: Max size is {{ get_max_upload_size(true) }}.</p>

<hr/>

