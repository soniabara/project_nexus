<?php

declare(strict_types =1);

function is_input_empty(string $firstname,string $lastname,string $pwd,string $email)
{
     if(empty($firstname)||empty($lastname)||empty($pwd)||empty($email)){
        return true;
     }
     else{
        return false;
     }
}

function is_email_valid(string $email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       return true;
    }
    else{
       return false;
    }
}

function is_username_taken(object $pdo,string $firstname)
{
    if(get_username( $pdo , $firstname)){
       return true;
    }
    else{
       return false;
    }
}

function is_email_registered(object $pdo,string $email)
{
    if(get_email( $pdo , $email)){
       return true;
    }
    else{
       return false;
    }
}

function create_user(object $pdo,string $pwd,string $firstname,string $lastname,string $email)
{
    set_user( $pdo, $pwd, $firstname, $lastname, $email);
}