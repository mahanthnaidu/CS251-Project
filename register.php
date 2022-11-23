<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['name'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['name']);

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    $cpass = validate($_POST['cpassword']);

    if (empty($uname)) {

        header("Location: register_form.php?error=Gamertag is required");

        exit();

    }else if(empty($pass)){

        header("Location: register_form.php?error=Password is required");

        exit();

    }else if(empty($email)){

        header("Location: register_form.php?error=email is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE email ='$email'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            header("Location: register_form.php?error=user already exists");

                exit();


            }

            if($pass != $cpass){

                    header("Location: register_form.php?error=password not matched!");

                     exit();
            }

        if (mysqli_num_rows($result) == 0){
                        $insert = "INSERT INTO `users` (`username`,`email`,`password`) VALUES ('$uname','$email','$pass');";
                        mysqli_query($conn, $insert);
                        header("Location: index.php");
                        exit();

                                }

                                    }

                                        }else{

                                                header("Location: register_form.php");

                                                exit();

                                                            }           