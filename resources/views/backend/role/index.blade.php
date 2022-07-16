@extends('backend.dashboard.layouts.app')



@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin user role</h3>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#role_add_modal">
                                Add new
                            </button>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="admin_role_table"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="SL: activate to sort column descending">
                                                        SL</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Name: activate to sort column ascending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Role: activate to sort column ascending">
                                                        Permission</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Status: activate to sort column ascending">
                                                        Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                {{-- <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                                    <td>Firefox 1.0 hhhhhhhhhhhhhhhhhhhhhhh</td>
                                                    <td>Win 98+ / OSX.2+</td>
                                                    <td>
                                                        <input type="checkbox" name="my-checkbox" checked=""
                                                            permission-status-switch="" data-off-color="danger"
                                                            data-on-color="success">
                                                    </td>
                                                    <td>
                                                        <div class="m-auto">
                                                            <a class="btn btn-info btn-sm">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <a class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i> Trash
                                                            </a>
                                                            <a class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash"></i> Trash
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr> --}}


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Role add modal --}}
    <div class="modal fade" id="role_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="role_add_form" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New permission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Permission name">
                        </div><span class="name-msg"></span><span class="name-check"></span>

                        <div class="form-group">
                            <label>Permission</label>

                            @foreach ($data as $permission)
                                <li style="list-style: none"><input name="permission[]" type="checkbox"
                                        id="{{ $permission->name }}" value="{{ $permission->name }}"> <label
                                        for="{{ $permission->name }}">{{ $permission->name }}</label>
                                </li>
                            @endforeach

                        </div><span class="per-msg"></span>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
