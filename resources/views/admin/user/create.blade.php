@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter Name" name="name">

                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    placeholder="Enter email" name="email">

                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" id="phone" aria-describedby="phoneHelp"
                                    placeholder="Enter phone" name="phone">

                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" aria-describedby="emailHelp"
                                    placeholder="Enter gender" name="gender">
                                    <option value="">-- Select gender --</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" aria-describedby="emailHelp"
                                    placeholder="Enter Password" name="password">

                            </div>
                            <div class="form-group">
                                <label for="password_conform">Conform Password</label>
                                <input type="password" class="form-control" id="password_confirmed"
                                    aria-describedby="emailHelp" placeholder="Confirm password" name="password_conform">

                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"
                                    name="image">

                            </div>
                            <div class="form-group">
                                <label for="is_admin">Is Admin</label>
                                <select class="form-control" id="is_admin" aria-describedby="emailHelp"
                                    placeholder="Enter is_admin" name="is_admin">
                                    <option value="">-- Is Admin --</option>
                                    <option value=1>Yes</option>
                                    <option value=0>No</option>
                                </select>
                                @error('is_admin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="roles">Roles : </label>
                                @foreach ($roles as $role)
                                    <input type="checkbox" id="roles_{{ $role->name }}" aria-describedby="emailHelp"
                                        name="role[]" value="{{ $role->name }}">
                                    <label for="roles_{{ $role->name }}">{{ $role->name }}</label>
                                @endforeach

                            </div>
                           
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Form Sizing -->





                <!-- Input Group -->

            </div>
        </div>
        <!--Row-->

        <!-- Documentation Link -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                        target="_blank">
                        bootstrap forms documentations.</a> and <a
                        href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                        groups documentations</a></p>
            </div>
        </div>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
    @endsection
