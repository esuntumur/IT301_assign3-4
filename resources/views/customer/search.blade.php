{{-- * B180910069 Амарбат --}}
@extends('layout.masterCustomer')
@section('content')
<h1>Search</h1>
<hr>
@if (isset($LoggedInfo))
<div class="card-deck">
    @foreach ($LoggedInfo as $item)
    <div class="card mx-3" style="max-width: 18rem;">
        <img class="card-img-top" src="{{$item['contentBanner']}}" alt="Card image cap">
        <div class="card-body">
            <a class="card-link" href="/customer/content/{{$item['id']}}">{{$item['name']}}</a>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
