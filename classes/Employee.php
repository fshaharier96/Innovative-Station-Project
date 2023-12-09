<?php
$dir = dirname(dirname(__FILE__));
include_once $dir . "/classes/Database.php";
class Employee{

    public function showEmployeeProfile($id){
        $db = new Database();
        $conn = $db->conn;
        $sql = "SELECT * FROM employee WHERE id={$id}";
        $result = mysqli_query($conn, $sql) or die('query unsuccessful');
        if($result){
            return $result;
        }else{
            return false;
        }



    }

    public function updateEmployeeProfile($post){
        $db = new Database();
        $conn = $db->conn;
        $id=$post['id'];
        $email=$post['email'];
        $first_name=$post['first_name'];
        $last_name=$post['last_name'];
        $password=$post['password'];
        $hashedPassword =base64_encode($password);

        $sql="UPDATE employee SET email='{$email}',first_name='{$first_name}',last_name='{$last_name}',password='{$hashedPassword}' WHERE id={$id}";
        $result=mysqli_query($conn,$sql) or die("query unsuccessful");
        if($result){
            header("Location:/home");
        }else{
            echo "data updation is failed";
        }

    }

}
