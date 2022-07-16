@extends('backend.dashboard.layouts.app')



@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#user_add_modal">
                                Add new
                            </button>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="admin_user_table"
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
                                                        Role</th>
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


                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                                    <td>Firefox 1.0 hhhhhhhhhhhhhhhhhhhhhhh</td>
                                                    <td>Win 98+ / OSX.2+</td>
                                                    <td>
                                                        <input type="checkbox" name="my-checkbox" checked=""
                                                            user-status-switch="" data-off-color="danger"
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
                                                </tr>

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



    {{-- User add modal --}}
    <div class="modal fade" id="user_add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">


            <form id="user_add_form" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name"
                                    placeholder="Full name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="form-control" id="username"
                                    placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="number">Phone</label>
                                <input name="number" type="text" class="form-control" id="number"
                                    placeholder="Mobile number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control password" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">-Select a role-</option>
                                    @foreach ($data as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="">Profile photo</label>
                                <input type="file" accept="image/*" id="choose-file" name="photo" />
                                <label for="choose-file">Upload photo</label>
                            </div>
                            <div class="mb-2" id="img-preview"></div>

                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input"
                                        id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a
                                            href="#">terms of service</a>.</label>
                                </div>
                            </div>
                        </div> --}}


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Full name">
                        </div><span class="name-msg"></span>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username"
                                placeholder="Username">
                        </div><span class="username-msg"></span><span class="username-check"></span>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="text" class="form-control" id="email"
                                placeholder="Email">
                        </div><span class="email-msg"></span><span class="email-val"></span><span
                            class="email-check"></span>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" type="text" class="form-control" id="phone"
                                placeholder="Phone number">
                        </div><span class="phone-msg"></span><span class="phone-val"></span><span
                            class="phone-check"></span>


                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control password" id="password"
                                placeholder="Password">
                        </div><span class="password-msg"></span><span class="password-check"></span>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">-Select a role-</option>
                                @foreach ($data as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>

                        </div><span class="role-msg"></span>

                        <div class="row">
                            <div class="col-sm-12" style="margin-bottom: -5px;">
                                <label for="">Profile photo</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="file" accept="image/*" id="choose-file" name="photo" />
                                <label for="choose-file">Upload profile photo</label>
                            </div>
                            <div class="col-sm-6">
                                <div id="img-preview"></div>
                            </div>
                        </div>



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
