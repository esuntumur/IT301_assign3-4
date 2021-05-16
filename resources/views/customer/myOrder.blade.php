{{-- * B180910069 Амарбат --}}
@extends('layout.masterCustomer')
@section('content')
<h1 class="text-white">Миний захиалгын хүсэлтүүд</h1>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Контентийн нэр</th>
            <th scope="col">Дэлгүүрийн эзэн</th>
            <th scope="col">Дэлгүүрийн хаяг</th>
            <th scope="col">Үнэ</th>
            <th scope="col">Захиалгийн тоо</th>
            <th scope="col">Захиалсан огноо</th>
        </tr>
        @for ($i = 0; $i < count($myContents); $i++) <tr>
            @if ($myOrder[$i]['renting']==0 && $myOrder[$i]['returnedDate']==null)
            <th>{{$myContents[$i][0]['name']}}</th>
            <th>{{$shops[$i][0]['name']}}</th>
            <th>{{$shops[$i][0]['address']}}</th>
            <th>{{$myOrder[$i]['orderPrice']}}</th>
            <th>{{$myOrder[$i]['quantity']}}</th>
            <th>{{$myOrder[$i]['created_at']}}</th>
            </tr>
            @endif
            @endfor
            </tbody>
</table>
<hr>
<h1 class="text-white">Миний захиалгууд</h1>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Content name</th>
            <th scope="col">shop name</th>
            <th scope="col">shop address</th>
            <th scope="col">price</th>
            <th scope="col">ordered quantity</th>
            <th scope="col">order req date</th>
            <th scope="col">avsn udr</th>
            <th scope="col">return date</th>
            <th scope="col">fine</th>
        </tr>
        @for ($i = 0; $i < count($myContents); $i++) <tr>
            @if ($myOrder[$i]['renting']==1)
            <th>{{$myContents[$i][0]['name']}}</th>
            <th>{{$shops[$i][0]['name']}}</th>
            <th>{{$shops[$i][0]['address']}}</th>
            <th>{{$myOrder[$i]['orderPrice']}}</th>
            <th>{{$myOrder[$i]['quantity']}}</th>
            <th>{{$myOrder[$i]['created_at']}}</th>
            <th>{{$myOrder[$i]['givedDate']}}</th>
            <th>{{$myOrder[$i]['returnedDate']}}</th>
            <th>{{$myOrder[$i]['fine']}}</th>
            <th><a href="{{'myorder/'.$myOrder[$i]['id']}}" . class="btn btn-primary stretched-link">Сунгах хүсэлт</a>
                </tr>
                @endif
                @endfor
                </tbody>
</table>
@if(session('success'))
<h3 class="text-success">{{session("success")}}</h3>
@endif
@endsection
