<?php

declare(strict_types=1);

function is_input_empty(string $firstname,string $pwd){
    if(empty($firstname)|| empty($pwd)){
        return true;
    }else {
        return false;
    }
}

function is_firstname_wrong(bool|array $result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}

function is_password_wrong(string $pwd,string $hashedPwd){
    if(!password_verify($pwd,$hashedPwd)){
        return true;
    }else{
        return false;
    }
}