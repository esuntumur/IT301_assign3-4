@extends('layout.masterCustomer')
@section('content')
    <h1>Content</h1>

<div class="card bg-secondary">
    <div class="row">
        <div> <a href="#"><img class="rounded ml-3" src="https://4.bp.blogspot.com/-oqtrufvgsh0/WnP_Dbo3YeI/AAAAAAAAAI8/1FlcPrH_FdI1s53hkV-Y5_HqChsGf3PPACLcBGAs/s1600/spiderman-1.jpg"></a></div>
        <aside class="col-sm-6">
            <article class="card-body p-5">
                <h3 class="title mb-3">{{$ContentData['name']}}</h3>
                <dl class="param param-feature">
                    <dt>Author</dt>
                    <dd>{{$ContentData['author']}}</dd>
                </dl> 
                <dl class="param param-feature">
                    <dt>Producer</dt>
                    <dd>{{$ContentData['producer']}}</dd>
                </dl>  
                <dl class="param param-feature">
                    <dt>Type</dt>
                    <dd>{{$ContentData['type']}}</dd>
                </dl>  
            <hr>
            <a href="/customer/content/{{$ContentData['id']}}/orderContent" class="btn btn-lg btn-primary text-uppercase"> Захиалах </a>
            </article>
        </aside>
    </div> 
</div>
 <h1 class="text-white pt-3">Trailer</h1>
 <hr>
<div class="embed-responsive embed-responsive-16by9">
   
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TYMMOjBUPMM" allowfullscreen></iframe>
</div>
@endsection