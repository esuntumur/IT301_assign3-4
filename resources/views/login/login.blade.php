@extends('layout.master')
@section('header')
<link rel="stylesheet" href="{{ URL::asset('css/login/login.css') }}" />
@stop
@section('content')
<!-- B170910031 Esuntumur -->
<script>
function get() {
    let loginType = document.getElementById("loginType").value;
    document.getElementById("form_id").action = "masterCustomer";
    if (loginType == 'admin') {
        document.getElementById("form_id").action = "masterAdmin";
    } else if (loginType == 'customer') {} else if (loginType == 'shop') {
        document.getElementById("form_id").action = "masterShop";
    }
}
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <form onsubmit="getNotYet();" id="form_id" class="box" method="POST" action="/login">
                    {{csrf_field()}}
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your username and password!</p>
                    <input type="text" name="name" placeholder="Username" id="name">
                    <input type="password" name="password" placeholder="Password">
                    <input type="submit" name="" value="Login" href="#">
                    <a class="forgot text-muted d-block small" href="{{ url('signUp') }}">Sign up</a>
                    <label class="text-white" for="loginType">Нэвтрэх хэлбэр:</label>
                    <div class="container col-md-5">
                        <select class="custom-select" name="loginType" id="loginType">
                            <option value="customer">Үйлчлүүлэгч</option>
                            <option value="shop">Түрээслүүлэгч</option>
                            <option value="admin">Админ</option>
                        </select>
                    </div>

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
