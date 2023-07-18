<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     $("#registration-form").validate({
        //         rules: {
        //             name: {
        //                 required: true,
        //                 minlength: 3,
        //                 lettersOnly: true
        //             },
        //             email: {
        //                 required: true,
        //                 email: true,
        //                 remote: {
        //                     url: "/api/check-email",
        //                     type: "post"
        //                 }
        //             },
        //             phone: {
        //                 required: true,
        //                 minlength: 10,
        //                 maxlength: 10,
        //                 digits: true,
        //                 remote: {
        //                     url: "/api/check-phone",
        //                     type: "post"
        //                 }
        //             },
        //             department: {
        //                 required: true
        //             }
        //         },
        //         messages: {
        //             name: {
        //                 required: "Please enter your name.",
        //                 minlength: "Name should have at least 3 characters.",
        //                 lettersOnly: "Name should contain only alphabets."
        //             },
        //             email: {
        //                 required: "Please enter your email.",
        //                 email: "Please enter a valid email.",
        //                 remote: "Email already exists."
        //             },
        //             phone: {
        //                 required: "Please enter your phone number.",
        //                 minlength: "Phone number should have 10 digits.",
        //                 maxlength: "Phone number should have 10 digits.",
        //                 digits: "Phone number should contain digits only.",
        //                 remote: "Phone number already exists."
        //             },
        //             department: {
        //                 required: "Please select a department."
        //             }
        //         },
        //         submitHandler: function(form) {
        //             form.submit();
        //         }
        //     });
        // });

        // $.validator.addMethod("lettersOnly", function(value, element) {
        //     return this.optional(element) || /^[A-Za-z]+$/i.test(value);
        // }, "Letters only please.");
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
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" minlength="10" maxlength="10" required>
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
