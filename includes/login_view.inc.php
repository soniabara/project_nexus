<?php
declare(strict_types=1);

function output_username(){
    if(isset($_SESSION["user_id"])){
        echo "you are logged in as ".$_SESSION["user_firstname"];
    }else{
        echo "you are not logged in";
    }
}

function check_login_errors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION['errors_login'];

        echo "<div>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . htmlspecialchars($error) . '</p>';
        }
        echo "</div>";

        unset($_SESSION['errors_login']);
    } else if(isset($_GET["login"])&& $_GET["login"]=== 'success')
    {
        echo'<br>';
        echo'<p class="form-error">login success!</p>';
    }
}