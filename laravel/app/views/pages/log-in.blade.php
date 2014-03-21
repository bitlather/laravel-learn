@extends('layout_primary')

@section('title')
    Log in
@stop

@section('content')
    <h1>Log in</h1>

    {{ Form::open(array('url' => '/log-in')) }}

        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::get('email')); }}

        <br />

        {{ Form::label('password', 'Password') }}
        {{ Form::password('password'); }}

        <br />

        {{ Form::submit('Log In'); }}

    {{ Form::close() }}
@stop