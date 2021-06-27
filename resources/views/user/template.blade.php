@extends('layouts.app')

@section('content')

    <div class="row "  style="margin:0px;">
        <div class="col-md-2  text-center sidebar m ">
            <ul class="list-group bg-livre">
                <div class="list-group bg-livre ">
                    <a href="{{ route("user.index")}}" class="list-group-item bg-livre text-white  ">Acceuil</a>
                    <a href="{{ route("user.livres.index")}}" class="list-group-item bg-livre text-white  ">Livres</a>
                </div>
            </ul>
        </div>

        <div class="col-md-10">
            <h1 class=" text-center text-livre my-3">
                @yield('h1')
            </h1>  
            @yield('mycontent') 
        </div>
    </div>
@endsection