<h1>add Content</h1>
@extends('layout.masterShop')
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" method="POST" action="{{url('mastershop/'.'addcontent')}}">
    {{csrf_field()}}
    <fieldset>

        <!-- Form Name -->
        <legend>ADD CONTENT</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contentId">CONTENT ID</label>
            <div class="col-md-4">
                <input id="contentId" name="contentId" placeholder="CONTENT ID" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contenQuantity">CONTENT QUANTITY</label>
            <div class="col-md-4">
                <input id="contenQuantity" name="contenQuantity" placeholder="CONTENT QUANTITY" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contenPrice">CONTENT PRICE</label>
            <div class="col-md-4">
                <input id="contenPrice" name="contenPrice" placeholder="CONTENT PRICE" class="form-control input-md" required="" type="text">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="shopId">SHOP ID</label>
            <div class="col-md-4">
                <input id="shopId" name="shopId" placeholder="SHOP ID" class="form-control input-md" required="" type="text">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="rentQuantity">RENT QUANTITY</label>
            <div class="col-md-4">
                <input id="rentQuantity" name="rentQuantity" placeholder="RENT QUANTITY" class="form-control input-md" required="" type="text">

            </div>
        </div>
        <!-- AUTHENTICATION -> EMAIL -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="rentQuantity">EMAIL</label>
            <div class="col-md-4">
                <input name="email" placeholder="EMAIL" class="form-control input-md" type="text">

            </div>
        </div>
        <!-- AUTHENTICATION -> TOKEN -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="rentQuantity">TOKEN</label>
            <div class="col-md-4">
                <input name="token" placeholder="TOKEN" class="form-control input-md" type="text">

            </div>
        </div>
        <!-- Button -->
        <d class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">ADD CONTENT</label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD</button>
            </div>
        </d i v>

    </fieldset>
</form>

@endsection
