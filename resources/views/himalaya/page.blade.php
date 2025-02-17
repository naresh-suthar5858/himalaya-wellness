@extends('himalaya.layouts.layout')

@section('content')
    <div class="container mt-5">
        <br>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">{{ $page->title }}</h1>
                <p class="lead text-muted">{{ $page->heading }}</p>
            </div>
        </div>

        <!-- Image and Description Section -->
        <div class="row mt-4">

             <!-- Image Section -->
             <div class="col-md-6 text-end">
                <img src="{{ $page->getFirstMediaUrl('image') }}" class="img-fluid" alt="Sample Image">
            </div>
            <!-- Text Section -->
            <div class="col-md-6 d-flex align-items-center">
                <div>
                    <p class="card-text">
                        {!! $page->description !!}
                    </p>
                </div>
            </div>
           
        </div>
        

    </div>
@endsection
