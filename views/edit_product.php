<?php
$dir = dirname(__DIR__);
include_once $dir . "/classes/Product.php";
$product = new Product();
$result = $product->showProductParam($id1);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name = $row['product_name'];
            $product_details = $row['product_details'];
            $product_price = $row['product_price'];
            $product_image = $row['product_thumbnail'];
        }
    } else {
        echo "No records found";
    }

}


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
    <link rel="stylesheet" href="/assets/style/css/main.css">

    <title>add Product</title>
</head>
<body>
<?php
include_once $dir . "/views/header.php";
?>
<div class="container">
    <div class="row  d-flex justify-content-center">
        <div class="col-6 d-flex justify-content-center align-items-center flex-column">
            <h2 class="mt-3">Edit Product</h2>

            <form class="form form-control border border-secondary p-4" action="/edit-product-data" method="post"
                  enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label class="form-label">Product name</label>
                    <input class="form-control border border-secondary" type="text" name="product_name"
                           placeholder="product name" value="<?php
                    if (isset($product_name)) {
                        echo $product_name;
                    } ?>"/>
                    <input hidden type="text" name="id" value="<?php echo $id1 ?>"/>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Product details</label>
                    <textarea rows="5" class="form-control border border-secondary" name="product_details"
                              placeholder="Description"><?php
                        if (isset($product_details)) {
                            echo $product_details;
                        } ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Product price</label>
                    <input class="form-control border border-secondary" type="text" name="product_price"
                           placeholder="product price" value="<?php
                    if (isset($product_price)) {
                        echo $product_price;
                    } ?>"/>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Multiple files input example</label>
                    <input class="form-control border border-secondary" type="file" name="image[]" multiple/>
                    <input hidden type="text" name="image2" value="<?php echo $product_image ?>"/>
                </div>
                <div><?php
                    if (isset($product_image)) {
                        echo '<img width="80"  src="' . $product_image . '" alt="product_img"/>';
                    } ?></div>
                <button class="form-control btn btn-primary" type="submit" name="submit">Update</button>
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
