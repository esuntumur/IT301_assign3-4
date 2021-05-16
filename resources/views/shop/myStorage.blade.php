@extends('layout.masterShop')
@section('content')
<style>
p {
  font-size: 20px;
  line-height: 14px;
}

</style>
    <h1 class="myStorage-title my-4">Миний агуулах</h1>
    @if (isset($myStorage))
        <div class="card-deck">
        @foreach ($myStorage as $content)
          <div class="card mx-3" style="max-width: 17rem;">
              <img class="card-img-top" src="{{$content['contentBanner']}}" alt="Card image cap">
              <div class="card-body pb-0">
                  <p>Content ID: {{$content['contentId']}}</p>
                  <p>Name: {{$content['name']}}</p>
                <p>Author: {{$content['author']}}</p>
                <p>Price: {{$content['price']}}</p>
                <p>Type: {{$content['type']}}</p>
                <p>Quantity: {{$content['quantity']}}</p>
                <p>Rent quantity: {{$content['rentQuantity']}}</p>
              </div>
          </div>
        @endforeach
         </div>
    @endif
@endsection
