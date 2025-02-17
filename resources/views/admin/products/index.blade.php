@extends('admin.layouts.layout')

@section('section')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List Of All Products</h4>
                            <p class="card-description"><a href="{{ route('product.create') }}">Add product</a>
                            </p>
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Name </th>
                                            <th> Status </th>
                                            <th> Image </th>
                                            <th> Quantity </th>
                                            <th> Stock Status </th>
                                            <th> Weight </th>
                                            <th> Price </th>
                                            <th> Special Price</th>
                                            <th> Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'qty',
                        name: 'qty',
                    },
                    {
                        data: 'stock_status',
                        name: 'stock_status',
                    },
                    {
                        data: 'weight',
                        name: 'weight',
                    },
                    {
                        data: 'price',
                        name: 'price',

                    },
                    {
                        data: 'special_price',
                        name: 'special_price',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
