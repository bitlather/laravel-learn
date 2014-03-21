@extends('layout_primary')

@section('title')
    Create an account
@stop

@section('content')
    <h1>Sign up</h1>

    {{ Form::open(array('url' => '/sign-up')) }}

        @if($errors->has('first_name'))
            <ul>
            @foreach($errors->get('first_name') as $message)
                <li>{{ $message }}</li>
            @endforeach
            </ul>
        @endif

        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', Input::get('first_name')); }}

        <br />

        @if($errors->has('last_name'))
            <ul>
            @foreach($errors->get('last_name') as $message)
                <li>{{ $message }}</li>
            @endforeach
            </ul>
        @endif

        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', Input::get('last_name')); }}

        <br />

        @if($errors->has('email'))
            <ul>
            @foreach($errors->get('email') as $message)
                <li>{{ $message }}</li>
            @endforeach
            </ul>
        @endif

        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::get('email')); }}

        <br />

        @if($errors->has('password'))
            <ul>
            @foreach($errors->get('password') as $message)
                <li>{{ $message }}</li>
            @endforeach
            </ul>
        @endif

        {{ Form::label('password', 'Password') }}
        {{ Form::password('password'); }}

        <br />

        {{ Form::submit('Sign up'); }}

    {{ Form::close() }}

@stop