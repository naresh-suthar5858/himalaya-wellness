@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Slider</h6>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                     
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" aria-describedby="emailHelp"
                                    placeholder="Enter Title" name="title" value="{{ $slider->title }}">
                            </div>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img src="{{$slider->getFirstMediaUrl('image')}}" alt="" height="200px" width="300px"> 
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"
                                    name="image">

                            </div>
                           

                            <div class="form-group">
                                <label for="ordering">Ordering</label>
                                <input type="number" class="form-control" id="ordering" aria-describedby="emailHelp"
                                    placeholder="Enter ordering" name="ordering" value="{{ $slider->ordering }}">

                            </div>
                            @error('ordering')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" aria-describedby="emailHelp"
                                    placeholder="Enter status" name="status">
                                    <option value="">-- Select Status --</option>
                                    <option value="1" {{ $slider->status ==1 ?'selected':'' }}>Enable</option>
                                    <option value="2" {{ $slider->status ==2 ?'selected':'' }}>Disable</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

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
    


    </div>
    <div>
    @endsection
