@extends('layout.masterShop')
@section('content')
<h1 class="text-white">Хүсэлтүүд</h1>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Захиалгын дугаар</th>
            <th scope="col">Контент нэр</th>
            <th scope="col">Хэрэглэгчийн дугаар</th>
            <th scope="col">Үнэ</th>
            <th scope="col">Захиалгийн тоо</th>
            <th scope="col">Захиалсан огноо</th>
        </tr>
        @for ($i = 0; $i < count($orders); $i++) <tr>
            @if ($orders[$i]['renting']==0 && $orders[$i]['returnedDate']==null)
            <th>{{$orders[$i]['id']}}</th>
            <th>{{$content[$i]['name']}}</th>
            <th>{{$orders[$i]['customerId']}}</th>
            <th>{{$orders[$i]['orderPrice']}}</th>
            <th>{{$orders[$i]['quantity']}}</th>
            <th>{{$orders[$i]['created_at']}}</th>
            </tr>
            @endif
            @endfor
            </tbody>
</table>
<hr>
<h1 class="text-white">Түрээс</h1>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Захиалгын дугаар</th>
            <th scope="col">Контент нэр</th>
            <th scope="col">Хэрэглэгчийн дугаар</th>
            <th scope="col">Үнэ</th>
            <th scope="col">Захиалгийн тоо</th>
            <th scope="col">Захиалсан огноо</th>
            <th scope="col">Авсан огноо</th>
        </tr>
        @for ($i = 0; $i < count($orders); $i++) <tr>
            @if ($orders[$i]['renting']==1 && $orders[$i]['returnedDate']==null)
            <th>{{$orders[$i]['id']}}</th>
            <th>{{$content[$i]['name']}}</th>
            <th>{{$orders[$i]['customerId']}}</th>
            <th>{{$orders[$i]['orderPrice']}}</th>
            <th>{{$orders[$i]['quantity']}}</th>
            <th>{{$orders[$i]['created_at']}}</th>
            <th>{{$orders[$i]['givedDate']}}</th>
            </tr>
            @endif
            @endfor
            </tbody>
</table>
<h1 class="text-white">Сунгах хүсэлт</h1>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Захиалгын дугаар</th>
            <th scope="col">Контент нэр</th>
            <th scope="col">Хэрэглэгчийн дугаар</th>
            <th scope="col">Үнэ</th>
            <th scope="col">Захиалгийн тоо</th>
            <th scope="col">Авсан огноо</th>
        </tr>
        @for ($i = 0; $i < count($orders); $i++) <tr>
            @if ($orders[$i]['renting']==1 && $orders[$i]['returnedDate']==null && $orders[$i]['extend']==0)
            <th>{{$orders[$i]['id']}}</th>
            <th>{{$content[$i]['name']}}</th>
            <th>{{$orders[$i]['customerId']}}</th>
            <th>{{$orders[$i]['orderPrice']}}</th>
            <th>{{$orders[$i]['quantity']}}</th>
            <th>{{$orders[$i]['givedDate']}}</th>
            <th><a href="{{'myorder/'.$orders[$i]['id']}}" class="btn btn-primary stretched-link">Сунгах</a>
            </th>
            </tr>
            @endif
            @endfor
            </tbody>
</table>
@if(session('success'))
<h3 class="text-success">{{session("success")}}</h3>
@endif
@endsection