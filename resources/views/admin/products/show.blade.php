@extends('admin.layouts.layout')

@section('section')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Product </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Product Data</h4>
                            {{-- <p class="card-description"><a href="{{ route('user.create') }}">add User</a> --}}
                            </p>
                            <div class="table-responsive">
                                <table class="table">

                                    <tbody>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <td>{{ $product->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>name</th>
                                                    <td>{{ $product->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thumb Image</th>
                                                    <td><img src="{{ $product->getFirstMediaUrl('image') }}" alt="no image"
                                                            height="200px" width="150px"></td>
                                                </tr>
                                                <tr>
                                                    <th>Banner Images</th>
                                                    <td>
                                                        <br>
                                                        @foreach ($product->getMedia('banner_images') as $item)
                                                            <img src="{{ $item->getUrl() }}" alt="no image"height="200px"
                                                                width="150px">
                                                        @endforeach
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th>Categories</th>
                                                    <td>

                                                        @foreach ($product->categories as $item)
                                                            {{ $item->name }}
                                                            <br>
                                                        @endforeach
                                                    </td>

                                                </tr>



                                                <tr>
                                                    <th>Related Products</th>
                                                    <td>
                                                        @foreach ($relatedProducts as $relatedProduct)
                                                            <div style="margin-bottom: 10px;">

                                                                <img src="{{ $relatedProduct->getFirstMediaUrl('image') }}"
                                                                    alt="{{ $relatedProduct->product_name }}" width="100"
                                                                    height="100">
                                                                <br>

                                                                {{ $relatedProduct->name }}
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>is_featured</th>
                                                    <td>{{ $product->is_featured == 0 ? 'Yes' : 'No' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>sku</th>
                                                    <td>{{ $product->sku }}</td>
                                                </tr>
                                                <tr>
                                                    <th>qty</th>
                                                    <td>{{ $product->qty }}</td>
                                                </tr>
                                                <tr>
                                                    <th>stock_status</th>
                                                    <td>
                                                        @if ($product->stock_status == 1)
                                                            In stock
                                                        @elseif ($product->stock_status == 0)
                                                            Not In Stock
                                                        @elseif ($product->stock_status == 2)
                                                            Few In Stock
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>weight</th>
                                                    <td>{{ $product->weight }}</td>
                                                </tr>
                                                <tr>
                                                    <th>price</th>
                                                    <td>{{ $product->price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>special_price</th>
                                                    <td>{{ $product->special_price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>special_price_from</th>
                                                    <td>{{ $product->special_price_from }}</td>
                                                </tr>
                                                <tr>
                                                    <th>special_price_to</th>
                                                    <td>{{ $product->special_price_to }}</td>
                                                </tr>
                                                <tr>
                                                    <th>short_description</th>
                                                    <td>{{ $product->short_description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>description</th>
                                                    <td>{!! $product->description !!}</td>
                                                </tr>
                                                <tr>
                                                    <th>special_price_to</th>
                                                    <td>{{ $product->special_price_to }}</td>
                                                </tr>
                                                <tr>
                                                    <th>related_product</th>
                                                    <td>{{ $product->related_product }}</td>
                                                </tr>
                                                <tr>
                                                    <th>url_key</th>
                                                    <td>{{ $product->url_key }}</td>
                                                </tr>
                                                <tr>
                                                    <th>meta_tag</th>
                                                    <td>{{ $product->meta_tag }}</td>
                                                </tr>
                                                <tr>
                                                    <th>meta_title</th>
                                                    <td>{{ $product->meta_title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>meta_description</th>
                                                    <td>{{ $product->meta_description }}</td>
                                                </tr>




                                                <th>Created At</th>
                                                <td>{{ $product->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Updated At</th>
                                                    <td>{{ $product->updated_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Actions</th>
                                                    <td>
                                                        <a class="dropdown-item"
                                                            href="{{ route('product.edit', $product->id) }}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('product.destroy', $product->id) }}"
                                                            method="post" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                style="background:none;border:none;padding:0;">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                        <a class="dropdown-item" href="{{ route('product.index') }}">
                                                            <i class="fa fa-arrow-left"></i> Back
                                                        </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- content-wrapper ends -->

    </div>
@endsection
