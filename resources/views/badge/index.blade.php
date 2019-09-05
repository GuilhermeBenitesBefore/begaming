@extends('layouts.app')

@section('content')
    @foreach($badges as $badge)
        {{$badge->name}}
        <br/>
    @endforeach
@endsection
