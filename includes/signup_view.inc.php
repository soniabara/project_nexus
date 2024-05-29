<?php
declare(strict_types=1);

function signup_inputs(){


if (isset($_SESSION["signup_data"]["firstname"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
    $firstname = $_SESSION["signup_data"]["firstname"];
    $lastname = $_SESSION["signup_data"]["lastname"];
    echo '
    <div class="two-forms">
        <div class="input-box">
            <input type="text" name="firstname" class="input-field" placeholder="Firstname" value="' . $firstname . '">
            <i class="bx bx-user"></i>
        </div>
        <div class="input-box">
            <input type="text" name="lastname" class="input-field" placeholder="Lastname" value="' . $lastname . '">
            <i class="bx bx-user"></i>
        </div>
    </div>';
}else{
    echo'<div class="two-forms">
    <div class="input-box">
        <input type="text" name = "firstname" class="input-field" placeholder="Firstname">
        <i class="bx bx-user"></i>
    </div>
    <div class="input-box">
        <input type="text" name = "lastname" class="input-field" placeholder="Lastname">
        <i class="bx bx-user"></i>
    </div>
</div>';
}
 
echo'<div class="input-box">
<input type="password" name = "pwd" class="input-field" placeholder="Password">
<i class="bx bx-lock-alt"></i>
</div>';

if(isset($_SESSION["signup_data"]["email"])&& !isset($_SESSION
["errors_signup"]["email_used"]) && !isset($_SESSION
["errors_signup"]["invalid_email"])){
    echo'<div class="input-box">
    <input type="text" name = "email" class="input-field" placeholder="Email" value="'.$_SESSION["signup_data"]["email"] .'">
    <i class="bx bx-envelope"></i>
</div>';
}else{
    echo'<div class="input-box">
    <input type="text" name = "email" class="input-field" placeholder="Email">
    <i class="bx bx-envelope"></i>
</div>';
}

}

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION['errors_signup'];

        echo "<div>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . htmlspecialchars($error) . '</p>';
        }
        echo "</div>";

        unset($_SESSION['errors_signup']);
    } else if(isset($_GET["signup"])&& $_GET["signup"]=== 'success')
    {
        echo'<br>';
        echo'<p class="form-error">Signup success!</p>';
    }
}