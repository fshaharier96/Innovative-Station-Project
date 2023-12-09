<?php
$dir = dirname(dirname(__FILE__));
include_once $dir . "/classes/Database.php";


class Product
{
    public function showProduct()
    {
        $db = new Database();
        $conn = $db->conn;
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql) or die('query unsuccessful');
        if ($result) {
            return $result;
        } else {
            return false;
        }


    }
    public function showProductParam($id)
    {
        $db = new Database();
        $conn = $db->conn;
        $sql = "SELECT * FROM products WHERE id={$id}";
        $result = mysqli_query($conn, $sql) or die('query unsuccessful');
        if ($result) {
            return $result;
        } else {
            return false;
        }


    }

    public function addProduct($post, $file)
    {

        global $dir;

        $db = new Database();
        $conn = $db->conn;
        if (!empty($post['product_name']) && !empty($post['product_details']) && !empty($post['product_price']) && !empty($file['image'])) {

            $images = array();
            $imagesTemp = array();
            $extArray = ['jpeg', 'jpg', 'png'];
            $totalFiles = count($file['image']['name']);
            for ($i = 0; $i < $totalFiles; $i++) {
                if ($i === 0) {
                    $thumbnail = $file['image']['name'][$i];
                    $thumbnailTempName = $file['image']['tmp_name'][$i];
                    $thumbExtension = explode('.', $thumbnail);
                    $thumbFileExtension = end($thumbExtension);
                    $thumbnailFinalPath = $dir . "/uploads/thumbnail-" . uniqid() . "-" . $thumbnail;
                    $thumbnailFinalPath2 = "/uploads/thumbnail-" . uniqid() . "-" . $thumbnail;
                    if (in_array($thumbFileExtension, $extArray)) {
                        move_uploaded_file($thumbnailTempName, $thumbnailFinalPath);
                    }
                } else {
                    array_push($images, $file['image']['name'][$i]);
                    array_push($imagesTemp, $file['image']['tmp_name'][$i]);
                }


            }


            $product_img_count = count($images);

            $imgFinalPaths = array();
            for ($i = 0; $i < $product_img_count; $i++) {
                $single_image = $images[$i];
                $fileTempName = $imagesTemp[$i];
                $extension = explode(".", $single_image);
                $fileExtension = end($extension);

                $imgFinalPath = $dir . "/uploads/product-" . uniqid() . "-" . $single_image;
                $imgFinalPath2 ="/uploads/product-" . uniqid() . "-" . $single_image;
                array_push($imgFinalPaths, $imgFinalPath2);
                if (in_array($fileExtension, $extArray)) {
                    move_uploaded_file($fileTempName, $imgFinalPath);
                }

            }

            $images2 = implode(',', $imgFinalPaths);


            $product_name = $post['product_name'];
            $product_details = $post['product_details'];
            $product_price = $post['product_price'];

            $sql = "INSERT INTO products(product_name,product_details,product_price,product_thumbnail) VALUES('{$product_name}','{$product_details}','{$product_price}','{$thumbnailFinalPath2}')";
            $result = mysqli_query($conn, $sql) or die("query unsuccessful");
            if ($result) {
               $product_id= mysqli_insert_id($conn);

                    $sql2 = "INSERT INTO product_images(product_id,image) VALUES({$product_id},'{$images2}')";
                    $result2 = mysqli_query($conn, $sql2) or die("query unsuccessful");




                header("Location:/home");
            } else {
                echo "data insertion failed";
            }


        }

    }

    public function editProduct($post,$file)
    {
        global $dir;

        $db = new Database();
        $conn = $db->conn;


            $images = array();
            $imagesTemp = array();
            $thumbnailFinalPath2="";
             $images2="";
            $extArray = ['jpeg', 'jpg', 'png'];
            $totalFiles = count($file['image']['name']);
            if($totalFiles>0) {
                for ($i = 0; $i < $totalFiles; $i++) {
                    if ($i === 0) {
                        $thumbnail = $file['image']['name'][$i];
                        $thumbnailTempName = $file['image']['tmp_name'][$i];
                        $thumbExtension = explode('.', $thumbnail);
                        $thumbFileExtension = end($thumbExtension);
                        $thumbnailFinalPath = $dir . "/uploads/thumbnail-" . uniqid() . "-" . $thumbnail;
                        $thumbnailFinalPath2 = "/uploads/thumbnail-" . uniqid() . "-" . $thumbnail;
                        if (in_array($thumbFileExtension, $extArray)) {
                            move_uploaded_file($thumbnailTempName, $thumbnailFinalPath);
                        }
                    } else {
                        array_push($images, $file['image']['name'][$i]);
                        array_push($imagesTemp, $file['image']['tmp_name'][$i]);
                    }


                }


                $product_img_count = count($images);

                $imgFinalPaths = array();
                for ($i = 0; $i < $product_img_count; $i++) {
                    $single_image = $images[$i];
                    $fileTempName = $imagesTemp[$i];
                    $extension = explode(".", $single_image);
                    $fileExtension = end($extension);

                    $imgFinalPath = $dir . "/uploads/product-" . uniqid() . "-" . $single_image;
                    $imgFinalPath2 = "/uploads/product-" . uniqid() . "-" . $single_image;
                    array_push($imgFinalPaths, $imgFinalPath2);
                    if (in_array($fileExtension, $extArray)) {
                        move_uploaded_file($fileTempName, $imgFinalPath);
                    }

                }

                $images2 = implode(',', $imgFinalPaths);
            }else{
                $images2=$post['image2'];
                $thumbnailFinalPath2=$post['image2'];
            }



            $product_name = $post['product_name'];
            $product_details = $post['product_details'];
            $product_price = $post['product_price'];
            $product_thubmnail=$post['image2'];
            $id=$post['id'];

            $sql = "UPDATE products SET product_name='{$product_name}',product_details='{$product_details}',product_price='{$product_price}',product_thumbnail='{$thumbnailFinalPath2}' WHERE id={$id}";
        $result = mysqli_query($conn, $sql) or die("query unsuccessful");
            if ($result) {
                $product_id=$id;

                $sql2 = "UPDATE product_images SET  image='{$images2}' WHERE product_id={$product_id}";
                $result2 = mysqli_query($conn, $sql2) or die("query unsuccessful");




                header("Location:/home");
            } else {
                echo "data insertion failed";
            }



    }

    public function deleteProduct($id)
    {
        $db = new Database();
        $conn = $db->conn;
        $sql="DELETE FROM products WHERE id={$id}";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful");
        if($result){
            header("Location:/home");
        }else{
            echo "Product deletion failed";
        }




    }


}
