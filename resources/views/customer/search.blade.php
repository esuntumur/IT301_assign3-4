@extends('layout.masterCustomer')
@section('content')
    <h1>Search</h1>
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

    <h3><a href="{{route('auth.logout')}}">Logout</a></h3>
@endsection
