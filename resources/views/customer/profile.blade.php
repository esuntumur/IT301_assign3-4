{{-- * B180910069 Амарбат --}}
@extends('layout.masterCustomer')
@section('content')
<div class="row py-5 px-4 text-dark">
    <div class="col-md-5 mx-auto ">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-3 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3"><img
                            src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                            alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="#"
                            class="btn btn-outline-dark btn-sm btn-block">Edit profile</a></div>
                    <div class="media-body mb-5">
                        <h4 class="mt-0 mb-0">{{$LoggedInfo['name']}} {{$LoggedInfo['ovog']}}</h4><br>
                        <p class="font-italic mb-0">Хаяг: {{$LoggedInfo['address']}}</p>
                        <p class="font-italic mb-0">Е-мэйл: {{$LoggedInfo['email']}}</p>
                        <p class="font-italic mb-0">Утас: {{$LoggedInfo['phone']}}</p>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
