@extends('templates.default.default')
@section('title', 'Home')

@section('content')
Testings
    @foreach($staff as $s)
        {{$s}}
    @endforeach
@endsection 