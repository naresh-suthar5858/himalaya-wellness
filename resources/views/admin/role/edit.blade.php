@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Role</h6>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                            @csrf
                            @method('PUT')
                            <div class="form-group">

                                <label for="name">Name : </label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter Role Name" name="name" value="{{ $role->name }}">

                            </div>
                            <div class="form-group">
                                <label for="permission">Permissions : </label>
                                <br>
                                <div class="row">
                                    @php
                                        $perm = $role->permissions->pluck('name')->toArray();
                                    @endphp
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-4">
                                            <input type="checkbox" class="mb-6" id="permission_{{ $permission->name }}"
                                                aria-describedby="emailHelp" name="permission[]"
                                                value="{{ $permission->name }}" {{ in_Array($permission->name , $perm)?'checked':'' }}>
                                            <label for="permission_{{ $permission->name }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Form Sizing -->

            </div>
        </div>
        <!--Row-->

    </div>
    <div>
    @endsection
