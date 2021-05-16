{{-- * B180910069 Амарбат --}}
@extends('layout.master')
@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/signUp/signUp.css') }}" />
@stop
@section('content')
<div class="row justify-content-center ">
    <div class="col-md-6  p-0">
        <div class="card1 ">
            <form onsubmit="" class="login-box mh-100" method="POST" action="{{ route('auth.save')}}">
                {{csrf_field()}}
                <div class="login-snip">
                    <input id="tab-1" type="radio" name="tab" value="one" class="sign-in" checked>
                    <label for="tab-1" class="tab">Үйлчлүүлэгч</label>
                    <input id="tab-2" type="radio" name="tab" value="two" class="sign-up">
                    <label for="tab-2" class="tab">Түрээслүүлэгч</label>
                    <div class="login-space">
                        <div class="login">
                            @if (Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            <div class="group">
                                <input name="ovog" type="text" class="input" placeholder="Овог"
                                    value="{{ old('ovog')}}">
                                <span class="text-danger">@error('ovog'){{$message}}@enderror</span>
                                <input name="name" type="text" class="input" placeholder="Нэр" value="{{ old('name')}}">
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                <input name="email" type="text" class="input" placeholder="Цахим хаяг"
                                    value="{{ old('email')}}">
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                <input name="phone" type="text" class="input" placeholder="Утас"
                                    value="{{ old('phone')}}">
                                <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                                <input name="register" type="text" class="input" placeholder="Регистэр"
                                    value="{{ old('register')}}">
                                <span class="text-danger">@error('register'){{$message}}@enderror</span>
                                <input name="address" type="text" class="input" placeholder="Хаяг"
                                    value="{{ old('address')}}">
                                <span class="text-danger">@error('address'){{$message}}@enderror</span>
                                <input name="password" type="password" class="input" data-type="password"
                                    placeholder="Нууц үг">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="container pl-5">
                                <div class="custom-control custom-radio custom-control-inline ml-5">
                                    <input type="radio" id="customRadioInline1" name="gender" value="1"
                                        class="custom-control-input">
                                    <label class="custom-control-label text-muted" for="customRadioInline1">Эр</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline ml-5">
                                    <input type="radio" id="customRadioInline2" name="gender" value="0"
                                        class="custom-control-input">
                                    <label class="custom-control-label text-muted" for="customRadioInline2">Эм</label>

                                </div>

                            </div>
                            <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                            <div class="container col-md-15 mb-3">
                                <label class="text-muted mx-auto mt-4"> Төрсөн огноо</label>
                                <input placeholder="Selected date" name="birthdate" type="date"
                                    class="form-control my-1">
                                <span class="text-danger">@error('birthdate'){{$message}}@enderror</span>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Бүртгүүлэх"> </div>
                            <a class="a text-muted small" href="{{ route('auth.login') }}">Нэвтрэх</a>
                        </div>
                        <div class="sign-up-form">
                            @if (Session::get('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::get('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            <div class="group">
                                <input name="name2" type="text" class="input" placeholder="Нэр">
                                <span class="text-danger">@error('name2'){{$message}}@enderror</span>
                                <input name="email2" type="text" class="input" placeholder="Цахим хаяг">
                                <span class="text-danger">@error('email2'){{$message}}@enderror</span>
                                <input name="phone2" type="text" class="input" placeholder="Утас">
                                <span class="text-danger">@error('phone2'){{$message}}@enderror</span>
                                <input name="address2" type="text" class="input" placeholder="Хаяг">
                                <span class="text-danger">@error('address2'){{$message}}@enderror</span>
                                <input name="password2" type="password" class="input" data-type="password"
                                    placeholder="Нууц үг">
                                <span class="text-danger">@error('password2'){{$message}}@enderror</span>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Бүртгүүлэх"> </div>
                            <a class="a text-muted small" href="{{ route('auth.login') }}">Нэвтрэх</a>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>

</div>


@stop
