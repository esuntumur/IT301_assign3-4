@extends('layout.master')
@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/login/login.css') }}" />
@stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <form id="form_id" class="box" method="POST" action="{{url('login')}}">
                    {{csrf_field()}}
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your email and password!</p>
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <a class="forgot text-muted d-block small" href="{{ url('signUp') }}">Sign up</a>
                    <label class="text-white" for="loginType">Нэвтрэх хэлбэр:</label>
                    <div class="container col-md-5">
                        <select class="custom-select" name="loginType" id="loginType">
                            <option value="customer">Үйлчлүүлэгч</option>
                            <option value="shop">Түрээслүүлэгч</option>
                            <option value="admin">Админ</option>
                        </select>
                    </div>
                    <input type="submit" name="" value="Login" href="#">
                    @if (isset($request))
                    <div class="form-group col-md-6">
                        <label>Token:</label>
                        <input type="text" class="form-control" name="token" value="{{$request->api_token}}" readonly>
                    </div>
                    @endif
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
