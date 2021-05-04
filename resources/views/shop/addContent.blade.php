@extends('layout.masterShop')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<form class="form-horizontal" method="POST" action="">
    {{csrf_field()}}
        <!-- Form Name -->
        <legend>ADD CONTENT</legend>
        <hr>
        <!-- Text input-->
        <div class="form-group">
            <label for="formGroupExampleInput">Example label</label>
            <input type="text" class="form-control" placeholder="Example input">
        </div>
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
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">ADD CONTENT</label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">ADD</button>
            </div>
        </div>

</form>

@endsection
