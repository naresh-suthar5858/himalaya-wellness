@extends('himalaya.layouts.layout')

@section('content')
    <!-- image/banner  slider  -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">



        <div class="carousel-inner">
            @foreach (sliders() as $slider)
                <div class="carousel-item active">
                    <img src="{{ $slider->getFirstMediaUrl('image') }}" class="d-block w-100 h-75" alt="banner images">
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- products -->


    <br>

    <div class="container mt-4">
        <div class="row">
            <!-- Card 1 -->
            @foreach (blocks() as $block)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card">
                        <img src="{{ $block->getFirstMediaUrl('image') }}" class="card-img-top"
                            alt="Himalaya Purifying Neem Face Wash">
                        <div class="card-body">
                            <h5 class="card-title">{{ $block->heading }}</h5>
                            <p class="card-text">
                                {!! $block->description !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach


            <!-- More Products Button -->
            <div class="text-center mt-4">
                <a href="{{route('category')}}">
                    <button type="button" class="btn btn-outline-success">More Products</button>
                </a>
            </div>
        </div>
    </div>

    
@endsection
