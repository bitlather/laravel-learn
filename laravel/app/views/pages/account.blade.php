@extends('layout_primary')

@section('title')
    My Account
@stop

@section('content')
    Name: {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}<br />
    Email: {{{ Auth::user()->email }}}
@stop
