<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#registration-form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        lettersOnly: true
                    },
                    // email: {
                    //     required: true,
                    //     email: true,
                    //     remote: {
                    //         url: "/api/check-email",
                    //         type: "post"
                    //     }
                    // },
                    // phone: {
                    //     required: true,
                    //     minlength: 10,
                    //     maxlength: 10,
                    //     digits: true,
                    //     remote: {
                    //         url: "/api/check-phone",
                    //         type: "post"
                    //     }
                    // },
                    department: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name.",
                        minlength: "Name should have at least 3 characters.",
                        lettersOnly: "Name should contain only alphabets."
                    },
                    // email: {
                    //     required: "Please enter your email.",
                    //     email: "Please enter a valid email.",
                    //     remote: "Email already exists."
                    // },
                    // phone: {
                    //     required: "Please enter your phone number.",
                    //     minlength: "Phone number should have 10 digits.",
                    //     maxlength: "Phone number should have 10 digits.",
                    //     digits: "Phone number should contain digits only.",
                    //     remote: "Phone number already exists."
                    // },
                    department: {
                        required: "Please select a department."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[A-Za-z]+$/i.test(value);
        }, "Letters only please.");


        $(document).ready(function() {
        // Email validation
            $('#email').on('input', function() {
                var email = $(this).val();
                if (email !== '') {
                    if (!isValidEmail(email)) {
                        $('#email-error1').text('Please enter a valid email address.');
                    } else {
                        $('#email-error1').empty();
                        checkDuplicateEmail(email);
                    }
                } else {
                    $('#email-error1').empty();
                }
            });

            // Email format validation
            function isValidEmail(email) {
                var emailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                return emailPattern.test(email);
            }

            // Check duplicate email using AJAX API
            function checkDuplicateEmail(email) {
                $.ajax({
                url: '/api/check-email',
                type: 'POST',
                data: { email: email },
                success: function(response) {
                    if (response.exists) {
                        $('#email-error1').text('This email is already registered.');
                    } else {
                        $('#email-error1').empty();
                    }
                },
                error: function() {
                    $('#email-error1').text('Error occurred while checking email availability.');
                }
                });
            }

            // Phone number validation
            $('#phone').on('keyup', function() {
                var phone = $(this).val();
                if (phone !== '') {
                    if (!isValidPhoneNumber(phone)) {
                        $('#phone-error1').text('Please enter a valid 10-digit phone number.');
                    } else {
                        $('#phone-error1').empty();
                        checkDuplicatePhone(phone);
                    }
                } else {
                    $('#phone-error1').empty();
                }
                
            });

            // Phone number format validation
            function isValidPhoneNumber(phone) {
                var phonePattern = /^[0-9]{10}$/;
                return phonePattern.test(phone);
            }

            // Check duplicate phone number using AJAX API
            function checkDuplicatePhone(phone) {
                $.ajax({
                    url: '/api/check-phone',
                    type: 'POST',
                    data: { phone: phone },
                    success: function(response) {
                        if (response.exists) {
                            $('#phone-error1').text('This phone number already exists.');
                        } else {
                            $('#phone-error1').empty();
                        }
                    },
                    error: function() {
                        $('#phone-error1').text('Error occurred while checking phone number availability.');
                    }
                });
            }

        });


    </script>
</head>
<body>
    <div class="container">
        <h2>Employee Registration</h2>
        <form id="registration-form" method="post" action="{{ route('employees.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" minlength="3" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <span id ="email-error1"></span>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="10" required>
                <div id="phone-error1" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="">Select Department</option>
                    <option value="IT">IT</option>
                    <option value="HR">HR</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </div>
            <div class="form-group">
                <label for="remark">Remark:</label>
                <textarea class="form-control" id="remark" name="remark"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
