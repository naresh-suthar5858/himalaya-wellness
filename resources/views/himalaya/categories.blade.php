@extends('himalaya.layouts.layout')

@section('content')
    <center>
        <h1 style="font-family: papyrus; font-weight: bolder;" class="p_head">ALL RANGE OF PRODUCTS</h1>
    </center>
    <br>
    <br>

    <div class="container">
        <div class="row">
            @foreach (categories() as $cat)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ $cat->getFirstMediaUrl('image') }}" class="card-img-top" alt="{{ $cat->name }}" style="max-height: 200px; object-fit: contain;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $cat->name }}</h5>
                            <a href="{{ route('category.product', $cat->id) }}" class="btn btn-primary mt-auto">Show products</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
