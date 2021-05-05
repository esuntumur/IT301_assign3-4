@extends('layout.masterShop')
@section('content')

<h1>Create content</h1>
<form class="form-horizontal" method="POST" action="{{route('shop.createContent')}}">
    {{csrf_field()}}
        <!-- Form Name -
        <legend>ADD CONTENT</legend
        <hr>

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
            <label class="col-md-4 control-label" for="rentQuantity">type</label>
            <div class="col-md-4">
                <input id="rentQuantity" name="type"  class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="rentQuantity">duration</label>
            <div class="col-md-4">
                <input id="rentQuantity" name="duration"  class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Create</button>
            </div>
        </div>
</form>
@endsection
