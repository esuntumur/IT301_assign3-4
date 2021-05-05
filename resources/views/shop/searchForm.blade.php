@extends('layout.masterShop')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<form class="form-inline mb-4" method="GET" action="{{route('shop.search')}}">
    {{csrf_field()}}
        <!-- Form Name -->
        <legend>ADD CONTENT</legend><hr>
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
              <img class="card-img-top" src="https://4.bp.blogspot.com/-oqtrufvgsh0/WnP_Dbo3YeI/AAAAAAAAAI8/1FlcPrH_FdI1s53hkV-Y5_HqChsGf3PPACLcBGAs/s1600/spiderman-1.jpg" alt="Card image cap">
              <div class="card-body">
                <a class="card-link" href="{{url('/shop/addContent/'.$item->id)}}">{{$item['name']}}</a>
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
