<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname = $_POST["firstname"];
    $pwd = $_POST["pwd"];

        try {
            require_once'dbh.inc.php';
            require_once'login_model.inc.php';
            require_once'login_contr.inc.php';

         // ERROR HANDLERS
        $errors = [];
        if (is_input_empty($firstname,$pwd)){
            $errors["empty_input"]="Fill in all fields!";
        }
        $result = get_user($pdo,$firstname);

        if(is_firstname_wrong($result)){
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        if (is_firstname_wrong($result)) {
            // Username is incorrect
            $errors["login_incorrect"] = "Incorrect login info!";
        } else {
            // Username is correct, check password
            if (is_password_wrong($pwd, $result["pwd"])) {
                // Password is incorrect
                $errors["login_incorrect"] = "Incorrect login info!";
            }
        }
        

        require_once 'config_session.inc.php';

        if($errors){
            $_SESSION["errors_login"]= $errors;
            
            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId."_".$result["id"];
        session_id($sessionId);

        $_SESSION["user_id"]= $result["id"];
        $_SESSION["user_firstname"]=htmlspecialchars($result["firstname"]);

        $_SESSION["last_regeneration"]=time();

        header("Location: ../index.php?login=success");
         $pdo=null;
         $statement=null;

         die();
        } catch (PDOException $e) {
            die("query failed:".$e->getMessage());
         }  
    
}
else{
    header("Location: ../index.php");
    die();
}  