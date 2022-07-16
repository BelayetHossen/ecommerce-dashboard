(function ($) {
    $(document).ready(function () {

        // empty function
        function empty(msg, type, margin = '-15px') {
            return `<p class="text-${type}" style="margin-top:${margin};">${msg}</p>`;
        }

        // Admin permission table to data-table
        $("#admin_role_table").DataTable({
            "responsive": true,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: {
                url: 'all-roles',
            },
            columns: [
                {
                    data: 'sl',
                    name: 'sl'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'permission',
                    name: 'permission'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });


        // add new role
        $(document).on('submit', '#role_add_form', function (e) {
            e.preventDefault();

            let name = $('#role_add_form input[name="name"]').val();

            if (name == '') {
                $('.name-msg').html(empty('The name field is requred !', 'danger'));
            } else {
                $('.name-msg').html('');
                $.ajax({
                    url: 'admin-role-store',
                    method: 'post',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.role_name == 'exist') {
                            $('.name-check').html(empty('The name is already exist !', 'warning'));
                        } else {
                            $('.name-check').html('');
                            $('#role_add_form')[0].reset();
                            $('#role_add_modal').modal('hide');
                            $('#admin_role_table').DataTable().ajax.reload();

                            toastr.success('New role added successfully')

                        }
                    }
                })

            }

        })


        // Role status update
        $(document).on('click', '#user_status_btn', function () {

            let id = $(this).val();
            let name = $(this).attr('role_name');

            $.ajax({
                url: 'role-status-update/' + id,
                success: function (data) {
                    console.log(data);
                    if (data == 'off') {
                        toastr.warning(name + ' ' + 'status is now off')
                    } else {
                        toastr.success(name + ' ' + 'status on successfully')
                    }

                }
            })


        })


        // Role delete
        $(document).on('click', '.role_delete_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('role_delete_id');

            swal({
                title: "Are you sure?",
                text: "Role deleted, you will not be able to recover this Permission file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: 'role-delete/' + id,
                            success: function (data) {
                                swal("Successfully! Role has been deleted!", {
                                    icon: "success",
                                });
                                $('#admin_role_table').DataTable().ajax.reload();
                            }

                        })
                    } else {
                        swal("Role file is safe!");
                    }
                });


        })




















        //
    })

})(jQuery)
