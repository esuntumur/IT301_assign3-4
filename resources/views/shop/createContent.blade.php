@extends('layout.masterShop')
@section('content')

<h1>Контент үүсгэх</h1>
<form class="form-horizontal" method="POST" action="{{route('shop.createContent')}}">
    {{csrf_field()}}
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contenQuantity">name</label>
            <div class="col-md-4">
                <input id="contenQuantity" name="name"  class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contenPrice">author</label>
            <div class="col-md-4">
                <input id="contenPrice" name="author"  class="form-control input-md" required="" type="text">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="shopId">producer</label>
            <div class="col-md-4">
                <input id="shopId" name="producer" value="" class="form-control input-md" type="text" >
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label">Movie type</label>
            <div class="col-md-4">
                <input  name="type"  class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" >duration</label>
            <div class="col-md-4">
                <input name="duration"  class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" >Trailer link</label>
            <div class="col-md-4">
                <input name="trailerLink"  class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" >Content banner</label>
            <div class="col-md-4">
                <input name="contentBanner"  class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Create</button>
            </div>
        </div>
</form>
@if(session('success'))
<h3 class="text-success">{{session("success")}}</h3>
@endif
@endsection
