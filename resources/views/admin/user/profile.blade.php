@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card shadow-lg">


                    <!-- Display error message -->
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="card-header text-center bg-primary text-white">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <!-- User Image -->
                                <img src="{{ auth()->user()->getFirstMediaUrl('image') }}" alt="User Image"
                                    class="img-fluid rounded-circle" style="width: 150px;">
                            </div>
                            <div class="col-md-8">
                                <!-- User Name -->
                                <h4>Name: {{ auth()->user()->name }}</h4>

                                <!-- Change Password Form -->
                                <form action="{{ route('changePassword') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control" id="current_password"
                                            name="current_password" placeholder="Enter current password">
                                    </div>
                                    @error('current_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            placeholder="Enter new password">
                                    </div>
                                    @error('new_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm New Password</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" placeholder="Confirm new password">
                                    </div>
                                    @error('confirm_password')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-success mt-3">Change Password</button>
                                </form>

                                <!-- Logout Button -->
                                <form action="{{ route('logOut') }}" method="POST" class="mt-3">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
