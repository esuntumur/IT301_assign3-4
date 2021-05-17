{{-- * B170910031 Есөнтөмөр --}}
@extends('layout.masterShop')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<form class="form-horizontal" method="POST" action="">
    {{csrf_field()}}
    {{-- Form Name --}}
    <legend>Контент хадгалах</legend>
    <hr>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="contentId">CONTENT ID</label>
        <div class="col-md-4">
            <input id="contentId" name="contentId" class="form-control input-md" value="{{$content->id}}" type="text"
                readonly>
        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="contenQuantity">CONTENT QUANTITY</label>
        <div class="col-md-4">
            <input id="contenQuantity" name="quantity" class="form-control input-md" required="" type="text">
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="contenPrice">CONTENT PRICE</label>
        <div class="col-md-4">
            <input id="contenPrice" name="price" class="form-control input-md" required="" type="text">

        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="shopId">SHOP ID</label>
        <div class="col-md-4">
            <input id="shopId" name="shopId" value="{{Session()->get('LoggedShop')}}" class="form-control input-md"
                type="text" readonly>

        </div>
    </div>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">STORE TYPE</label>
        <div class="col-md-4">
            <select name="type" id="">
                <option value="dvd">DVD</option>
                <option value="bd">BD (Blu-ray)</option>
                <option value="cd">CD</option>
            </select>
        </div>
    </div>
    <!-- Button -->
    <div class="form-group">
        <div class="col-md-4">
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD</button>
        </div>
    </div>
</form>
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

@endsection
