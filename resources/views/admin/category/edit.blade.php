@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter name" name="name" value="{{ $category->name }}">

                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="parent_category">Parent Category </label>
                                <select class="form-control" id="parent_category" aria-describedby="emailHelp"
                                    placeholder="Enter parent_category" name="parent_category">
                                    <option value="0">-- Parent Category --</option>
                                    @foreach ($categories as $cate)
                                    <option value="{{$cate->id}}"{{ $cate->id==$category->parent_category?'selected':'' }}>{{$cate->name}}</option>

                                    @endforeach
                                </select>
                                @error('parent_category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @php
                            
                            $selectedPro = $category->products()->get();
                            $selectedPro = $selectedPro->pluck('id')->toArray();
                        @endphp
                            <div class="form-group">
                                <label for="products">Products </label>
                                <select class="form-control" id="products" aria-describedby="emailHelp"
                                    placeholder="Enter products" name="products[]" multiple>
                                    <option value="0">-- Select Products --</option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}"{{ in_array($product->id,$selectedPro)?'selected':'' }}>{{$product->name}}</option>

                                    @endforeach
                                </select>
                                @error('products')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <img src="{{ $category->getFirstMediaUrl('image') }}" alt="no image">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" aria-describedby="emailHelp"
                                    name="image">

                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="show_in_menu">Show In Menu</label>
                                <select class="form-control" id="show_in_menu" aria-describedby="emailHelp"
                                    placeholder="Enter show_in_menu" name="show_in_menu">
                                    <option value="">-- Show In Menu --</option>
                                    <option value="1"{{ $category->show_in_menu==1?'selected':'' }}>No</option>
                                    <option value="2"{{ $category->show_in_menu==2?'selected':'' }}>Yes</option>
                                </select>
                                @error('show_in_menu')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" aria-describedby="emailHelp"
                                    placeholder="Enter status" name="status">
                                    <option value="">-- Select Status --</option>
                                    <option value="1"{{ $category->status==1?'selected':'' }}>Enable</option>
                                    <option value="2"{{ $category->status==2?'selected':'' }}>Disable</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_tag">Meta Tag</label>
                                <input type="text" class="form-control" id="meta_tag" aria-describedby="emailHelp"
                                    placeholder="Enter meta_tag" name="meta_tag" value="{{ $category->meta_tag }}">

                            </div>
                            @error('meta_tag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" aria-describedby="emailHelp"
                                    placeholder="Enter meta_title" name="meta_title" value="{{$category->meta_title }}">

                            </div>
                            @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" aria-describedby="meta_descriptionlHelp"
                                    placeholder="Enter meta description" cols="10" rows="5" name="meta_description">{{$category->meta_description}}</textarea>
                            </div>
                            @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                           

                           

                            
                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea class="form-control" id="short_description" aria-describedby="short_descriptionlHelp"
                                    placeholder="Enter short description" cols="10" rows="5" name="short_description">{{ $category->short_description}}</textarea>
                            </div>
                            @error('short_description')
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
                                        <textarea id="description" name="description" rows="10" cols="80" >{{ $category->description }}</textarea>
                                    </div>
                                </div>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        
                           

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Form Sizing -->
                <!-- Input Group -->


            </div>
            <!--Row-->

            <!-- Documentation Link -->
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                            target="_blank">
                            bootstrap forms documentations.</a> and <a
                            href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap
                            input
                            groups documentations</a></p>
                </div>
            </div>

        </div>
        <div>
        @endsection
