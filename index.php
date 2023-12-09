<?php
include_once "routes/web.php";
session_start();

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

    <title>login</title>
</head>
<body style="height: 100vh;">

<div class="container  h-100 p-4">
     <div class="row h-100  d-flex justify-content-center align-items-center">
         <div class="col-5 h-75  d-flex  flex-column p-5">
             <h2 class="text-center mb-3">Employee login</h2>
             <form id="loginForm" class="form-control border border-secondary p-4" action="/login-data" method="post">
                 <div class="form-group mb-3">
                     <label>Email</label>
                     <input type="email" class="form-control border border-secondary" name="email" />
                 </div>
                 <div class="form-group mb-3">
                     <label>Password</label>
                     <input type="password" class="form-control border border-secondary" name="password"/>
                 </div>
                 <button type="submit" name="submit" class="btn btn-primary form-control mb-3">login</button>
                 <div class="form-group">
                     <p>Don't have any account? <a class="text-decoration-none" href='/signup'>Sign up</a></p>
                 </div>


             </form>
         </div>
     </div>
</div>

<!-- javascript dependencies -->
<script src="../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js_plugin/jquery-form-validation/jquery.validate.min.js"></script>
<script src="../assets/js/index.js"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>
</html>
