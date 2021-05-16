@extends('layout.masterShop')
@section('content')
    <h1>Profile</h1>
    <h3>{{$LoggedInfo['name']}}</h3>
    <h3>{{$LoggedInfo['email']}}</h3>
@endsection
