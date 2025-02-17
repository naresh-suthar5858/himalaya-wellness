@extends('admin.layouts.layout')

@section('section')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List Of All Pages</h4>
                            <p class="card-description"><a href="{{ route('page.create') }}">Add Page</a>
                            </p>
                            <div class="table-responsive">
                                <table class="table data-table">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> URL_Key </th>
                                            <th> Title </th>
                                            <th> Heading </th>
                                            <th> Image </th>
                                            <th> Ordering </th>
                                            <th> Status </th>
                                            <th> Actions</th>
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
                ajax: "{{ route('page.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'url_key',
                        name: 'url_key'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'heading',
                        name: 'heading'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'ordering',
                        name: 'ordering'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
