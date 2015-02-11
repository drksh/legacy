@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">Register</div>
            <div class="panel-body">

                @include('layouts.partials.errors')

                {!! Form::open(['route' => 'auth.register', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
