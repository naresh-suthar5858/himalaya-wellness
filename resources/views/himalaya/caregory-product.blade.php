@extends('himalaya.layouts.layout')

@section('content')
    <style>
        .card {
            margin-top: 20px;
            margin-left: 70px;
        }
    </style>


    <br>
    <br>
    <br>


    <center>
        @foreach ($categories as $cat)
        <h1 style="font-family: papyrus; font-weight: bolder;">{{$cat->name}}</h1>
        @endforeach
    </center>
    <br>
    <br>

    <div class="container mt-4">
        <div class="row">
            @foreach ($categories as $cat)
                @foreach ($cat->products as $item)
                    <div class="col-md-3 mb-4 d-flex align-items-stretch">
                        <div class="card" style="height: 100%;">
                            <img src="{{ $item->getFirstMediaUrl('image') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('product.detail',$item->id) }}"><button class="btn btn-primary">Show Details</button></a>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>


@endsection
