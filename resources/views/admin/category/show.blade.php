@extends('admin.layouts.layout')

@section('section')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> category </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">

                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">category Data</h4>
                            {{-- <p class="card-description"><a href="{{ route('user.create') }}">add User</a> --}}
                            </p>
                            <div class="table-responsive">
                                <table class="table">

                                    <tbody>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th>
                                                    <td>{{ $category->id }}</td>
                                                </tr>
                                                <tr>
                                                    <th>name</th>
                                                    <td>{{ $category->name }}</td>
                                                </tr>
                                               
                                                <tr>
                                                    <th>Products</th>
                                                    <td>
                                                        
                                                        @foreach ($category->products as $item)
                                                            {{ $item->name }}
                                                               <br>
                                                        @endforeach
                                                    </td>

                                                </tr>



                                                


                                                <tr>
                                                    <th>is_featured</th>
                                                    <td>{{ $category->is_featured == 0 ? 'Yes' : 'No' }}</td>
                                                </tr>
                                               
                                                
                                               
                                                <tr>
                                                    <th>short_description</th>
                                                    <td>{{ $category->short_description }}</td>
                                                </tr>
                                                <tr>
                                                    <th>description</th>
                                                    <td>{!! $category->description !!}</td>
                                                </tr>
                                               
                                               
                                                <tr>
                                                    <th>url_key</th>
                                                    <td>{{ $category->url_key }}</td>
                                                </tr>
                                                <tr>
                                                    <th>meta_tag</th>
                                                    <td>{{ $category->meta_tag }}</td>
                                                </tr>
                                                <tr>
                                                    <th>meta_title</th>
                                                    <td>{{ $category->meta_title }}</td>
                                                </tr>
                                                <tr>
                                                    <th>meta_description</th>
                                                    <td>{{ $category->meta_description }}</td>
                                                </tr>




                                                <th>Created At</th>
                                                <td>{{ $category->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Updated At</th>
                                                    <td>{{ $category->updated_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Actions</th>
                                                    <td>
                                                        <a class="dropdown-item"
                                                            href="{{ route('category.edit', $category->id) }}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <form action="{{ route('category.destroy', $category->id) }}"
                                                            method="post" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                style="background:none;border:none;padding:0;">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                        <a class="dropdown-item" href="{{ route('category.index') }}">
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
