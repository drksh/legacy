@include('layouts.partials.errors')

<div class="form-group">
    {!! Form::text('destination', null, ['class' => 'form-control', 'placeholder' => 'Destination']) !!}
</div>

<hr/>

{!! Form::textarea('body', null, ['id' => 'the-editor']) !!}

<hr/>

