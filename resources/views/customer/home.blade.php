@extends('layout.masterCustomer')
@section('content')
<div class="mx-auto">
    @if (isset($weekContent))
        <h1 style="text-align: center;">Энэ долоо хоногийн шилдэг кино</h1><br>
        <div class="card bg-secondary">
        <div class="row">
            <div> <a href="#"><img class="rounded ml-3"width="320px" src="{{$weekContent['contentBanner']}}"></a></div>
            <aside class="col-sm-6">
                <article class="card-body p-5">
                    <h3 class="title mb-3">{{$weekContent['name']}}</h3>
                    <dl class="param param-feature">
                        <dt>Author</dt>
                        <dd>{{$weekContent['author']}}</dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Producer</dt>
                        <dd>{{$weekContent['producer']}}</dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Type</dt>
                        <dd>{{$weekContent['type']}}</dd>
                    </dl>
                <hr>
                <a href="/customer/content/{{$weekContent['id']}}/orderContent" class="btn btn-lg btn-primary text-uppercase"> Захиалах </a>
                </article>
            </aside>
        </div>
    </div>
        <h1 class="text-white pt-3">Trailer</h1>
    <hr>
    <div class="embed-responsive embed-responsive-16by9">

    <iframe class="embed-responsive-item" src="{{$weekContent['trailerLink']}}" allowfullscreen></iframe>
    </div>
    @endif
    @if (isset($monthContent))
        <br><h1 style="text-align: center;">Энэ сарын шилдэг кино</h1><br>
        <div class="card bg-secondary">
        <div class="row">
            <div> <a href="#"><img class="rounded ml-3"width="320px" src="{{$weekContent['contentBanner']}}"></a></div>
            <aside class="col-sm-6">
                <article class="card-body p-5">
                    <h3 class="title mb-3">{{$weekContent['name']}}</h3>
                    <dl class="param param-feature">
                        <dt>Author</dt>
                        <dd>{{$weekContent['author']}}</dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Producer</dt>
                        <dd>{{$weekContent['producer']}}</dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Type</dt>
                        <dd>{{$weekContent['type']}}</dd>
                    </dl>
                <hr>
                <a href="/customer/content/{{$weekContent['id']}}/orderContent" class="btn btn-lg btn-primary text-uppercase"> Захиалах </a>
                </article>
            </aside>
        </div>
    </div>
        <h1 class="text-white pt-3">Trailer</h1>
    <hr>
    <div class="embed-responsive embed-responsive-16by9">

    <iframe class="embed-responsive-item" src="{{$weekContent['trailerLink']}}" allowfullscreen></iframe>
    </div>
    @endif
</div>
@endsection
