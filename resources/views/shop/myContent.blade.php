@extends('layout.masterShop')
@section('content')
<style>
p {
  font-size: 20px;
  line-height: 14px;
}
</style>
    <h1 class="text-red my-4">My contents</h1>
    @if (isset($myContents))
        <div class="card-deck">
        @foreach ($myContents as $content)
          <div class="card mx-3" style="max-width: 17rem;">
              <img class="card-img-top" src="https://4.bp.blogspot.com/-oqtrufvgsh0/WnP_Dbo3YeI/AAAAAAAAAI8/1FlcPrH_FdI1s53hkV-Y5_HqChsGf3PPACLcBGAs/s1600/spiderman-1.jpg" alt="Card image cap">
              <div class="card-body pb-0">
                  <p>Content ID: {{$content['contentId']}}</p>
                  <p>Name: {{$content['name']}}</p>
                <p>Author: {{$content['author']}}</p>
                <p>Price: {{$content['price']}}</p>
                <p>Quantity: {{$content['quantity']}}</p>
                <p>Rent quantity: {{$content['rentQuantity']}}</p>
              </div>
          </div>
        @endforeach
         </div>
    @endif
@endsection
