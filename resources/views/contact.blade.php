@extends('himalaya.layouts.layout')

@section('content')
    <br>
    <br>
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <!-- Contact Form -->
            <div class="col-md-6 ">
                <div>
                    <div class="card-body">
                        <h4 class="card-title text-center">Contact Us</h4>
                        <form method="POST" action="{{ route('sendmessage') }}">

                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    name="name" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Your Email" 
                                    name="email" required>
                                @error('email')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Your Message"  name="message" required></textarea>

                                @error('message')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                <h5>Follow Us</h5>
                <div class="mt-3">
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
@endsection
