@extends('layout.masterAdmin')
@section('content')
<br>
<h1>Дэлгүүрүүдийн бүртгэл</h1><br>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Дэлгүүрийн дугаар</th>
            <th scope="col">Дэлгүүрийн нэр</th>
            <th scope="col">Дэлгүүрийн хаяг</th>
            <th scope="col">Дэлгүүрийн емэйл</th>
            <th scope="col">Дэлгүүрийн утас</th>
        </tr>
        @for ($i = 0; $i < count($shops); $i++) <tr>
            <th>{{$shops[$i]['id']}}</th>
            <th>{{$shops[$i]['name']}}</th>
            <th>{{$shops[$i]['address']}}</th>
            <th>{{$shops[$i]['email']}}</th>
            <th>{{$shops[$i]['phone']}}</th>
            <th scope="col"><a href="shops/{{$shops[$i]['id']}}">Устгах</a></th>
            </tr>
            @endfor
            </tbody>
</table>
@endsection
