@extends('layout.masterShop')
@section('content')
<form class="form-inline mb-4" method="POST" action="{{route('shop.recieveContent')}}">
    {{csrf_field()}}
        <!-- Form Name -->
        <legend>Захиалгын контентыг хэрэглэгчээс авах</legend><hr>
        <!-- Text input-->
        <div class="form-group">
                <input id="contentId" name="orderId" placeholder="Захиалгын дугаар" class="form-control input-md " required="" type="text">
        </div>
        <div class="form-group ml-3">
                <button id="singlebutton" type="submit" class="btn btn-primary">Авах</button>
        </div>
        <ul>
            @if($errors->any())
            @foreach($errors -> all() as $error)
            <li>{{$error}}</li>
            @endforeach
            @endif
        </ul>
        @if(session('success'))
        <h3 class="text-success">{{session("success")}}</h3>
        @endif
</form>
@endsection
