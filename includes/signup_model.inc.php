<?php

declare(strict_types =1);

function get_username(object $pdo ,string $firstname)
{
  $query ="SELECT firstname FROM users WHERE firstname = :firstname;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":firstname",$firstname);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function get_email(object $pdo ,string $email)
{
  $query ="SELECT firstname FROM users WHERE email = :email;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":email",$email);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function set_user(object $pdo,string $pwd,string $firstname,string $lastname,string $email){
  $query ="INSERT INTO users (firstname,lastname,pwd,email) VALUES (:firstname,:lastname,:pwd,:email);";
  $stmt = $pdo->prepare($query);

  $options = [
    'cost' => 12
  ];
  $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT,$options);

  $stmt->bindParam(":firstname",$firstname);
  $stmt->bindParam(":lastname",$lastname);
  $stmt->bindParam(":pwd",$hashedPwd);
  $stmt->bindParam(":email",$email);
  $stmt->execute();
}