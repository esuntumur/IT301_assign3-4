@extends('layout.masterAdmin')
@section('content')
<br>
{{-- * B170910031 Есөнтөмөр --}}
<h1>Үйлчлүүлэгчдийн бүртгэл</h1><br>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">Үйлчлүүлэгчийн дугаар</th>
            <th scope="col">Үйлчлүүлэгчийн овог</th>
            <th scope="col">Үйлчлүүлэгчийн нэр</th>
            <th scope="col">Үйлчлүүлэгчийн төрсөн огноо</th>
            <th scope="col">Үйлчлүүлэгчийн хаяг</th>
            <th scope="col">Үйлчлүүлэгчийн емэйл</th>
            <th scope="col">Үйлчлүүлэгчийн утас</th>
        </tr>
        @for ($i = 0; $i < count($customers); $i++) <tr>
            <th>{{$customers[$i]['id']}}</th>
            <th>{{$customers[$i]['ovog']}}</th>
            <th>{{$customers[$i]['name']}}</th>
            <th>{{$customers[$i]['birthdate']}}</th>
            <th>{{$customers[$i]['address']}}</th>
            <th>{{$customers[$i]['email']}}</th>
            <th>{{$customers[$i]['phone']}}</th>
            <th scope="col"><a href="{{route('admin.customers')}}">Устгах</a></th>
            </tr>
            @endfor
            </tbody>
</table>
@endsection
