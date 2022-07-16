


(function ($) {
    $(document).ready(function () {






        /*
        |--------------------------------------------------------------------------
        |  requred function
        |--------------------------------------------------------------------------
        */
        function warningMsg(msg, type, margin = '-15px') {
            return `<p class="text-${type}" style="margin-top: ${margin};">${msg}</p>`;
        }

        /*
        |--------------------------------------------------------------------------
        | Email validate function
        |--------------------------------------------------------------------------
        */
        function validateEmail(email) {

            let re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            return re.test(email);

        }


        /*
        |--------------------------------------------------------------------------
        | phone validate function
        |--------------------------------------------------------------------------
        */
        function validatePhone(phone) {

            let ph = /(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/i;
            return ph.test(phone);

        }



        // users table convert to data table
        $("#admin_user_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


        const chooseFile = document.getElementById("choose-file");
        const imgPreview = document.getElementById("img-preview");

        chooseFile.addEventListener("change", function () {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function () {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result + '" />';
                });
            }
        }


        // Password field validate
        $('.password').passtrength({
            minChars: 5,
            passwordToggle: true,
            tooltip: true
        });




        // add new user
        $(document).on('submit', '#user_add_form', function (e) {
            e.preventDefault();

            let name = $('#user_add_form input[name="name"]').val();
            let username = $('#user_add_form input[name="username"]').val();
            let phone = $('#user_add_form input[name="phone"]').val();
            let email = $('#user_add_form input[name="email"]').val();
            let password = $('#user_add_form input[name="password"]').val();
            let role = $('#user_add_form select[name="role"]').val();


            if (name == '') {
                $('.name-msg').html(warningMsg('The name field is requred !', 'danger'));
            } else {
                $('.name-msg').html('');
            }

            if (username == '') {
                $('.username-msg').html(warningMsg('The username field is requred !', 'danger'));
            } else {
                $('.username-msg').html('');
            }

            if (phone == '') {
                $('.phone-msg').html(warningMsg('The phone field is requred !', 'danger'));
            } else if (validatePhone(phone) == false) {
                $('.phone-msg').html('');
                $('.phone-val').html(warningMsg('The phone is not vallid !', 'warning'));
            } else {
                $('.phone-val').html('');
            }


            if (email == '') {
                $('.email-msg').html(warningMsg('The email field is requred !', 'danger'));
            } else if (validateEmail(email) == false) {
                $('.email-msg').html('');
                $('.email-val').html(warningMsg('The email is not vallid !', 'warning'));
            } else {
                $('.email-val').html('');
            }


            if (password == '') {
                $('.password-msg').html(warningMsg('The password field is requred !', 'danger'));
            } else {
                $('.password-msg').html('');
            }

            if (role == '') {
                $('.role-msg').html(warningMsg('The role field is requred !', 'danger'));
            } else {
                $('.role-msg').html('');
            }

            if (name != '' && username != '' && phone != '' && email != '' && password != '' && role != '') {
                $.ajax({
                    url: 'admin-user-store',
                    method: 'post',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        if (data.username == 'exist') {
                            $('.username-check').html(warningMsg('The username is already exist !', 'warning'));
                        } else {
                            $('.username-check').html('');
                        }
                        // if (data.email == 'exist') {
                        //     $('.email-check').html(empty('The email is already exist !', 'warning'));
                        // } else {
                        //     $('.email-check').html('');
                        // }
                        // if (data.phone == 'exist') {
                        //     $('.phone-check').html(empty('The phone number is already exist !', 'warning'));
                        // } else {
                        //     $('.phone-check').html('');
                        // }

                        if (data.username != 'exist' && data.email != 'exist' && data.phone != 'exist') {
                            $('#user_add_form')[0].reset();
                            $('#user_add_modal').modal('hide');
                            //$('#admin_role_table').DataTable().ajax.reload();

                            toastr.success('New user added successfully')
                        }



                    }
                })
            }

        })

















        //
    })

})(jQuery)
