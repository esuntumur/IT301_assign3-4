@extends('layout.master')
@section('header')
<link href="resources/css/login/login.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <form onsubmit="" class="box" method="POST" action="login">
                    {{csrf_field()}}
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your username and password!</p>
                    <input type="text" name="name" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" name="" value="Login" href="#">
                    <div class="col-md-12">
                        <ul class="text-danger text-left">
                            @if($errors->any())
                            @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            @endif
                        </ul>
                        @if(session('success'))
                        <h5 class="text-danger">{{session("success")}}</h5>
                        @endif
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection