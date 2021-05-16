@extends('layout.masterCustomer')
@section('content')
<div class="mx-auto">
    @if (isset($weekContent))
    <div class="mx-auto">
        <h1 class="">Энэ долоо хоногийн шилдэг кино</h1>
        <br><h3>{{$weekContent->name}}</h3>
        Зохиогч: {{$weekContent->author}}
        <br>Продиусер: {{$weekContent->producer}}
        <br>Төрөл: {{$weekContent->type}}
        <br>Үргэлжлэх хугацаа: {{$weekContent->duration}}
        <br><br><iframe class="embed-responsive-item" width="853"  height="480" src="{{$weekContent->trailerLink}}" allowfullscreen autoplay></iframe>
    </div>
    @endif
    @if (isset($monthContent))
    <div class="mx-auto">
        <h1 class="">Энэ сарын шилдэг кино</h1>
        <br><h3>{{$monthContent->name}}</h3>
        Зохиогч: {{$monthContent->author}}
        <br>Продиусер: {{$monthContent->producer}}
        <br>Төрөл: {{$monthContent->type}}
        <br>Үргэлжлэх хугацаа: {{$monthContent->duration}}
        <br><br><iframe class="embed-responsive-item" width="853"  height="480" src="{{$monthContent->trailerLink}}" allowfullscreen autoplay></iframe>
    </div>
    @endif
</div>
@endsection
