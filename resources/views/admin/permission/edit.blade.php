@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Permission</h6>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.update',$permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                
                                <label for="name">Name : </label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter Permission Name" name="name" value="{{ $permission->name }}" >

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

    <div>
        
    @endsection
