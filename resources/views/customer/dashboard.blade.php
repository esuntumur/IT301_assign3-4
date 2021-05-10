@extends('layout.masterCustomer')
@section('content')
    <h1>Customer</h1>
    <h3>{{$LoggedInfo['name']}}</h3>
    <h3>{{$LoggedInfo['email']}}</h3>
@endsection