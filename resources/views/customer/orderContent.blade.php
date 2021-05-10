@extends('layout.masterCustomer')
@section('content')
{{-- <form class="text-white mt-3" method="POST" action="{{route('customer.store', $ContentData['id'])}}">
  {{csrf_field()}}
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="inputGroupSelect01">Дэлгүүр</label>
    </div>
    <select class="custom-select" id="shopId" >
      @for ($i = 0; $i < count($shops) ; $i++)
        <option value="{{ $shops[$i][0]['address'] }}">ID: {{$storage[$i]['shopId']}}   |   Address: {{ $shops[$i][0]['address'] }}
        </option>
         {{ $shopid  = $storage[$i]['shopId']}}
      @endfor
    </select>
  </div>
  <div class="form-row" >
    <div class="form-group col-md-6">
      <label>Content</label>
      <input type="text" class="form-control" name="contentName" value="{{$ContentData['name']}}" readonly>
      <input type="hidden" name="shopId" value="{{$shopid}}">
      <input type="hidden" class="form-control" name="customerId" value="{{session()->has('LoggedCustomer')}}" readonly>
      <input type="hidden" class="form-control" name="contentId" value="{{$ContentData['id']}}" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Ширхэг</label>
      <input type="number" name="quantity" class="form-control" value="1">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Захиалах</button>
 
</form> --}}
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
          <input type="hidden" class="form-control" name="customerId" value="{{session()->has('LoggedCustomer')}}" readonly>
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
