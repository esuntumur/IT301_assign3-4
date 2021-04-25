 @extends('layout.master')
 @section('header')
 <link rel="stylesheet" href="{{ URL::asset('css/signUp/signUp.css') }}" />
 @stop
 @section('content')
<div class="row justify-content-center">
    <div class="col-md-6  p-0">
        <div class="card1">
            <form onsubmit="" class="login-box" method="POST" action="signUp">
                    {{csrf_field()}}
                <div class="login-snip">
                 <input id="tab-1" type="radio" name="tab" value="one" class="sign-in" checked>
                 <label for="tab-1" class="tab">Үйлчлүүлэгч</label> 
                 <input id="tab-2" type="radio" name="tab" value="two"  class="sign-up">
                 <label for="tab-2" class="tab">Түрээслүүлэгч</label>
                    <div class="login-space">
                        <div class="login">
                            <div class="group"> 
                                 <input name ="ovog" type="text" class="input" placeholder="Овог">
                                <input name ="name" type="text" class="input" placeholder="Нэр">
                                <input name ="email" type="text" class="input" placeholder="Цахим хаяг"> 
                                <input name ="phone" type="text" class="input" placeholder="Утас"> 
                                <input name ="register" type="text" class="input" placeholder="Регистэр"> 
                                 <input name ="address" type="text" class="input" placeholder="Хаяг"> 
                                  <input name ="password" type="password" class="input" data-type="password" placeholder="Нууц үг"> 
                             </div>
                             <div class="container pl-5">
                                <div class="custom-control custom-radio custom-control-inline ml-5">
                                    <input type="radio" id="customRadioInline1" name="gender" value="1" class="custom-control-input">
                                    <label class="custom-control-label text-muted" for="customRadioInline1">Эр</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline ml-5">
                                    <input type="radio" id="customRadioInline2" name="gender" value="0" class="custom-control-input">
                                    <label class="custom-control-label text-muted" for="customRadioInline2">Эм</label>
                                </div>
                             </div>
                             <div class="container col-md-15 mb-3">
                                <label class="text-muted mx-auto mt-4"> Төрсөн огноо</label>
                                <input placeholder="Selected date" name="birthdate" type="date" class="form-control my-1">
                            </div>  
                            <div class="group"> 
                                <input type="submit" class="button" value="Бүртгүүлэх"> </div>
                                <a class="a text-muted small" href="{{ url('login') }}">Нэвтрэх</a>
                        </div>
                        <div class="sign-up-form">
                           <div class="group"> 
                                <input name="name2" type="text" class="input"  placeholder="Нэр">
                                <input name="email2"  type="text" class="input"  placeholder="Цахим хаяг"> 
                                <input name="phone2"  type="text" class="input" placeholder="Утас"> 
                                 <input name="address2"  type="text" class="input" placeholder="Хаяг"> 
                                  <input name="password2"  type="password" class="input" data-type="password" placeholder="Нууц үг"> 
                             </div>  
                            <div class="group"> 
                                <input type="submit" class="button" value="Бүртгүүлэх"> </div>
                                <a class="a text-muted small" href="{{ url('login') }}">Нэвтрэх</a>
                            </div>
                            
                    </div>
                    
                </div>
                <div class="col-10">
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

    
@stop