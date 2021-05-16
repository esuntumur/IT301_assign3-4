@extends('layout.masterAdmin')
@section('content')
    <h1>ADmin</h1>
    <h3>{{$LoggedInfo['name']}}</h3>
    <h3>{{$LoggedInfo['email']}}</h3>
    {{-- <h3><a href="{{route('admin.home')}}">Logout</a></h3> --}}
@endsection
