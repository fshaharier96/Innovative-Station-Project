<?php
$dir = dirname(__DIR__);
include_once $dir . "/classes/Product.php";
$product = new Product();
$result = $product->showProduct();
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
    <title>home</title>
</head>
<body>
<?php
include_once $dir . "/views/header.php";

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex  col-12">
                <h3 class="text-left mb-4 col-6"><span class="border shadow rounded-2 px-3 py-1">All Products</span>
                </h3>
                <div class="col-6  d-flex justify-content-end"><a
                            class="btn btn-primary text-decoration-none d-inline-flex align-items-center  h-75 rounded-2"
                            href="/add-product">Add Product</a></div>
            </div>
            <table class="table table-striped">
                <thead class="table-primary">
                <tr class="">
                    <th>Product_id</th>
                    <th>Product_name</th>
                    <th>Product_details</th>
                    <th>Product_price</th>
                    <th>Product_image</th>
                    <th>Action</th>

                </tr>

                </thead>
                <tbody>
                <?php
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $thumb_img = $row['product_thumbnail'];
                            $image_path = '..' . $row['product_thumbnail'];
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['product_details'] ?></td>
                                <td><?php echo $row['product_price'] ?></td>
                                <?php ?>
                                <td><img width="60" src="<?php echo $image_path ?>" alt="product_img"/></td>

                                <td>
                                    <a class="btn btn-success" href="/edit-product/<?php echo $row['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="/delete/<?php echo $dir . $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }

                    }


                } else {
                    echo "no records found";
                }

                ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


<!-- javascript dependencies -->
<script src="../assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
