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
            $validation_errors = $validation->errors();
            $errors = $validation_errors->firstOfAll();
            $_SESSION['login_field_errors']=$errors;
            header('Location:/');
            exit;
        } else {

            $email = $post['email'];
            $password = $post['password'];
//            $hashedPassword = hash('sha256', $password);
            $hashedPassword=base64_encode($password);

            $sql = "SELECT * FROM employee WHERE email='{$email}' AND password='{$hashedPassword}'";

            $result = mysqli_query($conn, $sql) or die("query unsuccesful");

            if ($result) {

                if (mysqli_num_rows($result) > 0) {
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['user_id']=$row['id'];
                    $_SESSION['fname']=$row['first_name'];


                    header("Location:/home");
                    exit;
                } else {
                      $_SESSION['login_error']='wrong username or password';
                    header('Location:/');
//                    $session->set("error", "This email has been taken already");
                }

            }
        }


    }
    public function signup($post){
     // Initialize Database class
        session_start();
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

            $validation_errors = $validation->errors();
            $errors = $validation_errors->firstOfAll();
            $_SESSION['signup_field_errors']=$errors;
            header('Location:/signup');


        } else {

            $email = $post['email'];
            $first_name = $post['first_name'];
            $last_name = $post['last_name'];
            $password = $post['password'];
            $hashedPassword =base64_encode($password);

            $sql = "SELECT * FROM employee WHERE email='{$email}'";
            $sql1 = "INSERT INTO employee(first_name,last_name,email,password) VALUES('{$first_name}','{$last_name}','{$email}','{$hashedPassword}')";
            $result = mysqli_query($conn, $sql) or die("query unsuccesful");

            if ($result) {

                if (mysqli_num_rows($result) == 0) {
                    if (mysqli_query($conn, $sql1)) {


                         header("Location:/");

                    } else {
                        $_SESSION['signup_error']="registration failed";
                        header('Location:/signup');

                    }
                } else {

                    $_SESSION['signup_error']="The email has already been taken";
                    header('Location:/signup');

                }

            }
        }

    }

    public function logout(){
     session_start();
     session_unset();
     session_destroy();
     header("Location:/");
    }



}