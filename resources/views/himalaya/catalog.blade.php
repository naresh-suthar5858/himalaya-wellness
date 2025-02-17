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

    <br>
    <br>

    <div class="container mt-4">
        <div class="row">
            @if ($products && $products->count() > 0)
                @foreach ($products as $item)
                    <div class="col-md-3 mb-4 d-flex align-items-stretch">
                        <div class="card" style="height: 100%;">
                            <img src="{{ $item->getFirstMediaUrl('image') }}" class="card-img-top" alt="{{ $item->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('product.detail', $item->id) }}">
                                    <button class="btn btn-primary">Show Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p>No Matching Product Found</p>
                </div>
            @endif
        </div>
    </div>
    


@endsection
