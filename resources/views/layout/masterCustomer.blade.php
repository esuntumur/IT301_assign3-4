@extends('layout.master')
@section('content')
<h1>Customer home</h1>
@if(isset($name) && isset($password))
<h1>name: {{$name}}</h1>
<h1>pass: {{$password}}</h1>
@endif

@endsection
