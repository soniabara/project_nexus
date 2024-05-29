<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        // ERROR HANDLERS
        $errors = [];
        if (is_input_empty($firstname,$lastname,$pwd,$email)){
            $errors["empty_input"]="Fill in all fields!";
        }
        if (is_email_valid($email)){
            $errors["invalid_email"]="Invalid email used!";
        }
        if(is_username_taken( $pdo, $firstname)){
            $errors["username_taken"]="Username already taken!";
        }
        if( is_email_registered( $pdo, $email)){
            $errors["email_used"]="email already registered!";
        }

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_signup"]= $errors;

            $signupData = [
                "firstname"=> $firstname,
                "lastname"=> $lastname,
                "email"=> $email
            ];
            $_SESSION["signup_data"]=$signupData;
            
            header("Location: ../index.php");
            die();
        }

        create_user( $pdo, $pwd, $firstname, $lastname, $email);
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

      die();
    } catch (PDOException $e) {
       die("query failed:".$e->getMessage());
    }
}else{
      header("Location: ../index.php#");
      die();
}