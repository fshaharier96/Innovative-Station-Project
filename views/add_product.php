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

    <title>add Product</title>
</head>
<body>
<?php
$dir = dirname(__DIR__);
include_once $dir . "/views/header.php";
?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6 d-flex justify-content-center align-items-center flex-column">
            <h2 class="mt-3">Add Product</h2>
            <form class="form form-control border border-secondary p-4" action="/add-product-data" method="post"
                  enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label class="form-label">Product name</label>
                    <input class="form-control border border-secondary" type="text" name="product_name"
                           placeholder="product name"/>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Product details</label>
                    <textarea rows="5" class="form-control border border-secondary" name="product_details"
                              placeholder="Description"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Product price</label>
                    <input class="form-control border border-secondary" type="text" name="product_price"
                           placeholder="product price"/>

                </div>

                <div id="image-field" class="form-group mb-3">
                    <label class="form-label">Image</label>
                    <div class="d-flex w-100">
                        <input class="form-control  border border-secondary me-2" type="file" name="image[]" multiple/>

                    </div>
                    <span class="text-success">* add multiple image at a time</span>
                </div>


                <button class="form-control btn btn-primary" type="submit" name="submit">Add</button>
            </form>
        </div>
    </div>
</div>


<!-- javascript dependencies -->
<script src="../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <script src="../assets/js/add_product.js"></script>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>
