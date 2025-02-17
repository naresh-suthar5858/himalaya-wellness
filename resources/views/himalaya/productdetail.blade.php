@extends('himalaya.layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row ">
        <!-- Main Product Image with Slider -->
        <div class="col-md-6 mt-5">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Main Image -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $product->getFirstMediaUrl('image') }}" class="d-block w-50" alt="Product Image">
                    </div>
                    {{-- @foreach ($product->getMedia('images') as $image)
                        <div class="carousel-item">
                            <img src="{{ $image->getUrl() }}" class="d-block w-100" alt="Thumbnail">
                        </div>
                    @endforeach --}}
                </div>

                <!-- Thumbnails -->
                {{-- <div class="carousel-indicators">
                    <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    @foreach ($product->getMedia('images') as $key => $image)
                        <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $key + 1 }}" aria-label="Slide {{ $key + 2 }}"></button>
                    @endforeach
                </div> --}}
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6 mt-5">
            <h1>{{ $product->name }}</h1>
            {{-- <p class="text-muted">SKU: {{ $product->sku }}</p> --}}
            <h2 class="text-danger">₹{{ number_format($product->price, 2) }}</h2>
            <p class="mt-3">{!! $product->description !!}</p>

            {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="d-flex align-items-center mt-4">
                    <label for="quantity" class="form-label me-2">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control me-3" style="width: 80px;" min="1" value="1">
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </div>
            </form> --}}
        </div>
    </div>
</div>
@endsection
