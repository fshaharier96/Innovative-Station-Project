<?php


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- fontawsome cdn -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- bootstrap css file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- stylesheet link-->
    <link rel="stylesheet" href="../assets/style/css/main.css">

    <title>sign up</title>
</head>
<body style="height: 100vh;">
<div class="container h-100">
    <div class="row h-100 d-flex justify-content-center align-items-center">
        <div class="col-7 h-100 d-flex justify-content-center align-items-center flex-column">
            <h2 class="text-center mb-3">Employee Register</h2>
            <form id="signupForm" class="w-75 form-control border border-secondary p-4" action="/signup-data" method="post">
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input  type="email" class="form-control border border-secondary" name="email" placeholder="Enter email"/>
                </div>
                <div class="form-group mb-3">
                    <label>First Name</label>
                    <input type="text" class="form-control border border-secondary" name="first_name" placeholder="Enter first name"/>
                </div>
                <div class="form-group mb-3">
                    <label>Last Name</label>
                    <input type="text" class="form-control border border-secondary" name="last_name" placeholder="Enter last name"/>
                </div>

                <div class="form-group mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control border border-secondary" name="password" placeholder="Enter password"/>
                </div>
                <div class="form-group mb-3">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control border border-secondary" name="confirm_password" placeholder="Retype password"/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary form-control mb-3">Sign up</button>
                <div class="form-group">
                    <p>Already have an account? <a class="text-decoration-none" href="/">Login in</a></p>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- javascript dependencies -->
<script src="../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js_plugin/jquery-form-validation/jquery.validate.min.js"></script>
<script src="../assets/js/signup.js"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>
</html>
