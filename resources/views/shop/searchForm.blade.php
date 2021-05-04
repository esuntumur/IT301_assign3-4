@extends('layout.masterShop')
@section('content')
<!------ Include the above in your HEAD tag ---------->
<form class="form-horizontal" method="GET" action="{{route('shop.search')}}">
    {{csrf_field()}}
        <!-- Form Name -->
        <legend>ADD CONTENT</legend>
        <hr>
        <!-- Text input-->
        <div class="form-group">
            <div class="col-md-4">
                <input id="contentId" name="search" placeholder="Search movie" class="form-control input-md" required="" type="text">
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <div class="col-md-4">
                <button id="singlebutton" type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
</form>
@if (isset($LoggedInfo))
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Нэр</th>
      <th scope="col">Зохиолч</th>
      <th scope="col">Найруулагч</th>
      <th scope="col">төрөл</th>
      <th scope="col">Хугацаа</th>
      <th scope="col"><a href="">add</a></th>
    </tr>
  </thead>
  <tbody>
        @foreach ($LoggedInfo as $item)
          <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item['name']}}</td>
            <td>{{$item['author']}}</td>
            <td>{{$item['producer']}}</td>
            <td>{{$item['type']}}</td>
             <td>{{$item['duration']}}</td>
        </tr>
        @endforeach
  </tbody>
</table>

    @endif

@endsection
