@extends('layout.masterCustomer')
@section('content')
    <form class="text-white">
       <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Дэлгүүр</label>
            </div>
            <select class="custom-select" id="shopId" >
                @for ($i = 0; $i < 2 ; $i++)
                    <option value="{{ $shops[$i][0]['address'] }}">ID: {{$storage[$i]['shopId']}}   |   Address: {{ $shops[$i][0]['address'] }}
                    </option>
                @endfor
            </select>
        </div>
  <div class="form-row" >
    <div class="form-group col-md-6">
      <label class=""">Name</label>
      <input type="text" class="form-control" value="{{$ContentData['name']}}" readonly>
    </div>
    <div class="form-group col-md-6">
      <label >Password</label>
      <input type="text" class="form-control" value=" ">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" >
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
@endsection
