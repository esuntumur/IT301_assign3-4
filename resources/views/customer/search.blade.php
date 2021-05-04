@extends('layout.masterCustomer')
@section('content')
    <h1>Customer</h1>
    @if (isset($LoggedInfo))
    <div class="card-deck">
        @foreach ($LoggedInfo as $item)
          <div class="card mx-3" style="max-width: 18rem;">
              <img class="card-img-top" src="https://4.bp.blogspot.com/-oqtrufvgsh0/WnP_Dbo3YeI/AAAAAAAAAI8/1FlcPrH_FdI1s53hkV-Y5_HqChsGf3PPACLcBGAs/s1600/spiderman-1.jpg" alt="Card image cap">
              <div class="card-body">
                <a class="card-link" href="">{{$item['name']}}</a>
              </div>
          </div>
        @endforeach
         </div>
    @endif
    <h3><a href="{{route('auth.logout')}}">Logout</a></h3>
@endsection