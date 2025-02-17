@extends('admin.layouts.layout')

@section('section')
    <div class="container-fluid" id="container-wrapper">

        <div class="row">
            <div class="col-lg-12">
                <!-- Form Basic -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add Permission</h6>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('permission.store') }}" method="POST">
                           

                            @csrf
                            <div class="form-group">
                                <button type="button" id="add_btn" class="btn btn-primary"> + Add More</button>
                                <br>
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter Permission Name" name="name[]">

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

     
    </div>
    <div>
        <script>
            $('document').ready(function() {

                $('#add_btn').click(function() {
                    $col = `
                    <tr> <td>
                                   <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Enter Permission Name" name="name[]">

                                        </td>
                                        <td>
                                        <button id="del" class="btn btn-danger" type="button">Delete</button>
                                        </td>
                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    
                                    </tr>
                                `;

                    $(this).parent().append($col);
                })

                $('body').on('click', '#del', function() {
                    $(this).parents('tr').remove();
                })

            });
        </script>
    @endsection
