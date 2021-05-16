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
@foreach ($myStorage as $content)
<div class="card bg-secondary mt-2">
  <div class="row">
    <div> <a href="#"><img class="rounded ml-3" width="305px" src="{{$content['contentBanner']}}"></a></div>
    <aside class="col-sm-6">
      <article class="card-body p-4">
        <h3 class="title mb-3">{{$content['name']}}</h3>
        <dl class="param param-feature">
          <dt>Author</dt>
          <dd>{{$content['author']}}</dd>
        </dl>
        <dl class="param param-feature">
          <dt>Price</dt>
          <dd>{{$content['price']}}</dd>
        </dl>
        <dl class="param param-feature">
          <dt>Type</dt>
          <dd>{{$content['type']}}</dd>
        </dl>
        <dl class="param param-feature">
          <dt>Quantity</dt>
          <dd>{{$content['quantity']}}</dd>
        </dl>
        <dl class="param param-feature">
          <dt>Rent quantity</dt>
          <dd>{{$content['rentQuantity']}}</dd>
        </dl>
      </article>
    </aside>
  </div>
</div>
@endforeach
@endif
{{-- @if (isset($myStorage))
<div class="card-deck text-dark">
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
@endif --}}
@endsection