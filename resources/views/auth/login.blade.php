@extends('layouts.master')

@section('content')
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">

            @include('layouts.partials.errors')

            <form role="form" method="POST" action="/auth/login">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
