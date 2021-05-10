@extends('layout.masterCustomer')
@section('content')
  <div id="accordion" class="text-white">
<?php 
    $Numbers = array('One', "Two", "Three", "Four");
  ?>
  
    @for ($i = 0; $i < count($shops); $i++)
    {{-- {{$Numbers[1]}} --}}
       <div class="card bg-dark">
    <div class="card-header">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$Numbers[$i]}}"  aria-controls="collapse{{$Numbers[$i]}}">
          Name: {{$shops[$i][0]['name']}} | Address: {{$shops[$i][0]['address']}} 
        </button>
      </h5>
    </div>
    <div id="collapse{{$Numbers[$i]}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordion">
      <form class="p-4" method="POST" action="{{route('customer.store', $ContentData['id'])}}">
           {{csrf_field()}}
           <?php 
            $shopid  = $storage[$i]['shopId'];
          ?>
        
          <label>Захиалах тоо</label>
          <input type="number" name="quantity" class="form-control " value="1">
          <button type="submit" class="btn btn-primary mt-2">Захиалах</button>
          <input type="hidden" name="shopId" value="{{$shopid}}">
          <input type="hidden" class="form-control" name="customerId" value="{{session('LoggedCustomer')}}" readonly>
          <input type="hidden" class="form-control" name="contentId" value="{{$ContentData['id']}}" readonly>
      </form>
       @if(session('success'))
      <h3 class="text-success">{{session("success")}}</h3>
      @endif
    </div>
  </div> 
    @endfor
  </div>
 


@endsection
