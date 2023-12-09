<?php
$dir=dirname(dirname(__FILE__));
include_once $dir."/classes/Database.php";
require 'vendor/autoload.php';
use Rakit\Validation\Validator;



class Register{

    public function login($post){

        $db=new Database();
        $conn=$db->conn;
        session_start();
        $validator = new Validator();
        $validation = $validator->validate($post, [
            'email' => 'required|email',
            'password'=>'required|min:6',



        ]);
        if ($validation->fails()) {
//            $validation_errors = $validation->errors();
//            $errors = $validation_errors->firstOfAll();
//
//            /* echo '<pre>';
//             print_r($errors);
//             echo '</pre>';*/
//
//            $session->set("error", "Invalid username or password");
//            $session->set("field_errors", $errors);
            echo "invalid username or  password";
        } else {

            $email = $post['email'];
            $password = $post['password'];
            $hashedPassword = hash('sha256', $password);

            $sql = "SELECT * FROM employee WHERE email='{$email}' AND password='{$hashedPassword}'";

            $result = mysqli_query($conn, $sql) or die("query unsuccesful");

            if ($result) {

                if (mysqli_num_rows($result) > 0) {
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['user_id']=$row['id'];
                    $_SESSION['fname']=$row['first_name'];
                    header("Location:/home");
                } else {
                      echo "Icorrect password or username";
//                    $session->set("error", "This email has been taken already");
                }

            }
        }


    }
    public function signup($post){
     // Initialize Database class

        $db=new Database();
        $conn=$db->conn;
        $validator = new Validator();
        $validation = $validator->validate($post, [
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password'=>'required|min:6',
            'confirm_password' => 'required|same:password',


        ]);

        if ($validation->fails()) {
//            $validation_errors = $validation->errors();
//            $errors = $validation_errors->firstOfAll();
//
//            /* echo '<pre>';
//             print_r($errors);
//             echo '</pre>';*/
//
//            $session->set("error", "Invalid username or password");
//            $session->set("field_errors", $errors);
            echo "invalid username or  password";
        } else {

            $email = $post['email'];
            $first_name = $post['first_name'];
            $last_name = $post['last_name'];
            $password = $post['password'];
            $hashedPassword = hash('sha256', $password);

            $sql = "SELECT * FROM employee WHERE email='{$email}'";
            $sql1 = "INSERT INTO employee(first_name,last_name,email,password) VALUES('{$first_name}','{$last_name}','{$email}','{$hashedPassword}')";
            $result = mysqli_query($conn, $sql) or die("query unsuccesful");

            if ($result) {

                if (mysqli_num_rows($result) == 0) {
                    if (mysqli_query($conn, $sql1)) {

//                        $session->set("success", "Registration successful! ");
                         header("Location:/");

                    } else {

//                        $session->set("error", "Registration failed");
                        echo "registration failed";
                    }
                } else {

//                    $session->set("error", "This email has been taken already");
                    echo "duplicate email";
                }

            }
        }



    }


}