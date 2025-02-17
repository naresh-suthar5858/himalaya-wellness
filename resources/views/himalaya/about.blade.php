@extends('himalaya.layouts.layout')

@section('content')
    <div class="container">
        <!-- Title Section -->
        <center>
            <h1 style="font-family: papyrus; font-weight: bolder;" class="mb-4">About Us</h1>
        </center>

        <!-- Address and Contact Section -->
        <div class="row mb-4">
            <!-- Address Section -->
            <div class="col-md-6">
                <div class="card border-0 h-100">
                    <div class="card-body">
                        <p class="card-text">
                            <span class="fw-bold">Address:</span><br>
                            <span>YOGESH ENTERPRISES (Himalaya Wellness Company)</span><br>
                            <span>Balaji Market, Sardarshahar Churu (Rajasthan) 331403</span>
                        </p>
                        <span class="fw-bold">Contact:</span><br>
                        <p class="card-text">
                            6376932766<br>
                            7073900667<br>
                        </p>
                        
                        <!-- Social Media Icons -->
                        <div class="mt-3">
                            <span class="fw-bold">Follow Us:</span><br>
                            <a href="https://www.facebook.com" target="_blank" class="me-3">
                                <i class="fab fa-facebook fa-3x text-primary"></i>
                            </a>
                            <a href="https://www.instagram.com" target="_blank" class="me-3">
                                <i class="fab fa-instagram fa-3x text-danger"></i>
                            </a>
                            <a href="https://wa.me/6376932766" target="_blank">
                                <i class="fab fa-whatsapp fa-3x text-success"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Map Section -->
            <div class="col-md-6">
                <div class="card border-0">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d219.25871708079188!2d74.5052141!3d28.4452117!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3914f7b18675f363%3A0x1258f89db14808e6!2sHimalaya%20Wellness%20Store!5e0!3m2!1sen!2sin!4v1732982892674!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
        </div>

        <!-- Banner Section -->
        {{-- <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <img src="{{ asset('himalaya/resources/banner/banner 4.jpg') }}" class="card-img-top" alt="Himalaya Products Banner"
                        style="max-height: 25% ; width:25%">
                    <div class="card-body text-center">
                        <p class="card-text">Wholesale and Retail Seller of Himalaya Wellness Products</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
