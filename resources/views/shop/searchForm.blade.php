@extends('layout.masterShop')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<form class="form-inline mb-4" method="GET" action="{{route('shop.search')}}">
    {{csrf_field()}}
        <!-- Form Name -->
        <legend>Контент хайх</legend><hr>
        <!-- Text input-->
        <div class="form-group">
                <input id="contentId" name="search" placeholder="Search movie" class="form-control input-md " required="" type="text">
        </div>
        <div class="form-group ml-3">
                <button id="singlebutton" type="submit" class="btn btn-primary">Search</button>
        </div>
</form>
@if (isset($LoggedInfo))
         <div class="card-deck">
        @foreach ($LoggedInfo as $item)
          <div class="card mx-3" style="max-width: 18rem;">
              <img class="card-img-top" src="{{$item['contentBanner']}}" alt="Card image cap">
              <div class="card-body">
                  <h5>{{$item['name']}}</h5>
                <a class="card-link" href="{{url('/shop/storeContent/'.$item->id)}}">Store</a>
              </div>
          </div>
        @endforeach
         </div>
    @endif
    @if(isset($fail))
<h3 class="text-success">{{$fail}}</h3>
<a href="{{route('shop.createContent')}}">Шинээр контент үүсгэх</a>
@endif

@endsection
