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
    <link rel="stylesheet" href="assets/style/css/main.css">

    <title>profile</title>
</head>
<body>
<?php
$dir=dirname(__DIR__);
include_once $dir."/views/header.php";
?>
<div class="container">
    <div class="row  d-flex justify-content-center">
        <div class="col-6 d-flex justify-content-center align-items-center flex-column">
            <h2 class="mt-3">Edit Profile</h2>
            <form class="form form-control border border-secondary p-4" action="" method="post">
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
                <button type="submit" name="submit" class="btn btn-primary form-control mb-3">Update</button>
            </form>
        </div>
    </div>
</div>






<!-- javascript dependencies -->
<script src="../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>
