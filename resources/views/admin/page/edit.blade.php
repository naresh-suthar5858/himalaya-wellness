@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Page</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" aria-describedby="emailHelp"
                                    placeholder="Enter title" name="title" value="{{ $page->title }}">

                            </div>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="heading">Heading</label>
                                <input type="heading" class="form-control" id="heading" aria-describedby="headingHelp"
                                    placeholder="Enter heading" name="heading" value="{{ $page->heading }}">

                            </div>
                            @error('heading')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="description">Description</label>
                                {{-- CK editor --}}
                                <div class='box'>
                                    <div class='box-header'>
                                        <!-- tools box -->
                                        <div class="pull-right box-tools">

                                        </div><!-- /. tools -->
                                    </div><!-- /.box-header -->
                                    <div class='box-body pad'>
                                        <textarea id="description" name="description" rows="10" cols="80">{{ $page->description }}</textarea>
                                    </div>
                                </div>

                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <img src="{{ $page->getFirstMediaUrl('image') }}" alt="no image" height="200px">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"
                                    name="image">

                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="ordering">Ordering</label>
                                <input type="number" class="form-control" id="ordering" aria-describedby="emailHelp"
                                    placeholder="Enter ordering" name="ordering" value="{{ $page->ordering }}">

                            </div>
                            @error('ordering')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" aria-describedby="emailHelp"
                                    placeholder="Enter status" name="status">
                                    <option value="">-- Select Status --</option>
                                    <option value="1"{{ $page->status == 1 ? 'selected' : '' }}>Enable</option>
                                    <option value="2"{{ $page->status == 2 ? 'selected' : '' }}>Disable</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="show_in_menu">Show In Menu</label>
                                <select class="form-control" id="show_in_menu" aria-describedby="emailHelp"
                                    placeholder="Enter show_in_menu" name="show_in_menu">
                                    <option value="">-- Show In Menu --</option>
                                    <option value="1"{{ $page->show_in_menu == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2"{{ $page->show_in_menu == 2 ? 'selected' : '' }}>No</option>
                                </select>
                                @error('show_in_menu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="show_in_footer">Show In Footer</label>
                                <select class="form-control" id="show_in_footer" aria-describedby="emailHelp"
                                    placeholder="Enter show_in_footer" name="show_in_footer">
                                    <option value="">-- Show In Footer --</option>
                                    <option value="1"{{ $page->show_in_footer == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2"{{ $page->show_in_footer == 2 ? 'selected' : '' }}>No</option>
                                </select>
                                @error('show_in_footer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="meta_tag">Meta Tag</label>
                                <input type="text" id="meta_tag" name="meta_tag"
                                    class="form-control @error('meta_tag') border-danger @enderror"
                                    value="{{$page->meta_tag}}"  placeholder="meta_tag">
                                @error('meta_tag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- meta title --}}
                            <div class="form-group">
                                <label for="meta_title">meta_title</label>
                                <input type="text" id="meta_title" name="meta_title"
                                    class="form-control @error('meta_title') border-danger @enderror"
                                    value="{{$page->meta_title}}"  placeholder="meta_title">
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            {{-- meta description --}}
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" name="meta_description"
                                    class="form-control @error('meta_description') border-danger @enderror" rows="3"
                                    placeholder="Short Description">{{$page->meta_description}}</textarea>
                                @error('meta_description')
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
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                        target="_blank">
                        bootstrap forms documentations.</a> and <a
                        href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                        groups documentations</a></p>
            </div>
        </div>

    </div>
    <div>
    @endsection
