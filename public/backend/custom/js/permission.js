

(function ($) {
    $(document).ready(function () {

        // empty function
        function empty(msg, type, margin = '-15px') {
            return `<p class="text-${type}" style="margin-top:${margin};">${msg}</p>`;
        }

        // Admin permission table to data-table
        $("#admin_permission_table").DataTable({
            "responsive": true,
            "autoWidth": false,
            processing: true,
            serverSide: true,
            ajax: {
                url: 'all-permissions',
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
                    data: 'action',
                    name: 'action'
                },
            ]
        });


        // add new permission
        $(document).on('submit', '#permission_add_form', function (e) {
            e.preventDefault();

            let name = $('#permission_add_form input[name="name"]').val();

            if (name == '') {
                $('.name-msg').html(empty('The name field is requred !', 'danger'));
            } else {
                $('.name-msg').html('');
                $.ajax({
                    url: 'admin-permission-store',
                    method: 'post',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.permission_name == 'exist') {
                            $('.name-check').html(empty('The name is already exist !', 'warning'));
                        } else {
                            $('.name-check').html('');
                            $('#permission_add_form')[0].reset();
                            $('#permission_add_modal').modal('hide');
                            $('#admin_permission_table').DataTable().ajax.reload();

                            toastr.success('New permission added successfully')

                        }
                    }
                })

            }

        })


        // Permission delete
        $(document).on('click', '.permission_delete_btn', function (e) {
            e.preventDefault();
            let id = $(this).attr('permission_delete_id');

            swal({
                title: "Are you sure?",
                text: "Permission deleted, you will not be able to recover this Permission file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: 'admin-permission-delete/' + id,
                            success: function (data) {
                                swal("Successfully! Permission has been deleted!", {
                                    icon: "success",
                                });
                                $('#admin_permission_table').DataTable().ajax.reload();
                            }

                        })
                    } else {
                        swal("Permission file is safe!");
                    }
                });


        })




















        //
    })

})(jQuery)
