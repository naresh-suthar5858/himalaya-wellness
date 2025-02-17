@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">


        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Page</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- First Row -->
                            <div class="row">
                                <!-- First Column -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name"
                                            aria-describedby="emailHelp" placeholder="Enter name" name="name"
                                            value="{{ old('name') }}">

                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" aria-describedby="emailHelp"
                                            placeholder="Enter status" name="status">
                                            <option value="">-- Select Status --</option>
                                            <option value="1"{{ old('status') == 1 ? 'selected' : '' }}>Enable</option>
                                            <option value="2"{{ old('status') == 2 ? 'selected' : '' }}>Disable
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="is_featured">Is Featured</label>
                                        <select class="form-control" id="is_featured" aria-describedby="emailHelp"
                                            placeholder="Enter is_featured" name="is_featured">
                                            <option value="">-- Is Featured --</option>
                                            <option value="1"{{ old('is_featured') == 1 ? 'selected' : '' }}>No
                                            </option>
                                            <option value="2"{{ old('is_featured') == 2 ? 'selected' : '' }}>Yes
                                            </option>
                                        </select>
                                        @error('is_featured')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="number" class="form-control" id="weight"
                                            aria-describedby="weightlHelp" placeholder="Enter weight" name="weight"
                                            inputmode="decimal" value="{{ old('weight') }}">

                                        @error('weight')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" id="price"
                                            aria-describedby="pricelHelp" placeholder="Enter price" name="price"
                                            inputmode="decimal" value="{{ old('price') }}">

                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="special_price">Special Price</label>
                                        <input type="text" class="form-control" id="special_price"
                                            aria-describedby="special_pricelHelp" placeholder="Enter special price"
                                            name="special_price" inputmode="decimal" value="{{ old('special_price') }}">

                                    </div>
                                    @error('special_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                    <div class="form-group">
                                        <label for="special_price_from">Special Price From</label>
                                        <input type="date" class="form-control" id="special_price_from"
                                            aria-describedby="special_price_fromlHelp" placeholder="Enter special price"
                                            name="special_price_from" inputmode="decimal"
                                            value="{{ old('special_price_from') }}">

                                    </div>
                                    @error('special_price_from')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="special_price_to">Special Price To</label>
                                        <input type="date" class="form-control" id="special_price_to"
                                            aria-describedby="special_price_tolHelp" placeholder="Enter special price"
                                            name="special_price_to" inputmode="decimal"
                                            value="{{ old('special_price_to') }}">

                                    </div>
                                    @error('special_price_to')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea class="form-control" id="short_description" aria-describedby="short_descriptionlHelp"
                                            placeholder="Enter short description" cols="10" rows="5" name="short_description">{{ old('short_description') }}</textarea>
                                    </div>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                <div class="col-md-6">
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
                                                <textarea id="description" name="description" rows="10" cols="80">{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="related_product">Related Product</label>

                                        <select class="form-control" id="related_product" aria-describedby="emailHelp"
                                            placeholder="Enter related_product" name="related_product[]" multiple>
                                            <option value="">-- Select Related Product --</option>
                                            @foreach ($products as $product)
                                                <option
                                                    value="{{ $product->id }}"{{ old('related_product') == 1 ? 'selected' : '' }}>
                                                    {{ $product->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    @error('related_product')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="category">Category</label>

                                        <select class="form-control" id="category" aria-describedby="emailHelp"
                                            name="category[]" multiple>
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"{{ old('category') == 1 ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach

                                        </select>


                                    </div>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                    <div class="form-group">
                                        <label for="meta_tag">Meta Tag</label>
                                        <input type="text" class="form-control" id="meta_tag"
                                            aria-describedby="emailHelp" placeholder="Enter meta_tag" name="meta_tag"
                                            value="{{ old('meta_tag') }}">

                                    </div>
                                    @error('meta_tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title"
                                            aria-describedby="emailHelp" placeholder="Enter meta_title" name="meta_title"
                                            value="{{ old('meta_title') }}">

                                    </div>
                                    @error('meta_title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" aria-describedby="meta_descriptionlHelp"
                                            placeholder="Enter meta description" cols="10" rows="5" name="meta_description">{{ old('meta_description') }}</textarea>
                                    </div>
                                    @error('meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="thumb_image">Thumb Image</label>
                                        <input type="file" class="form-control" id="thumb_image"
                                            aria-describedby="emailHelp" name="thumb_image">

                                    </div>
                                    @error('thumb_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <br>
                                        <label for="banner_images[]">Banner Image</label>
                                        <input type="file" class="form-control" id="banner_image"
                                            aria-describedby="emailHelp" name="banner_images[]" multiple>

                                    </div>
                                    @error('banner_images[]')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
            <!--Row-->

        </div>
    </div>
@endsection
