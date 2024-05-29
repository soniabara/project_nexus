<?php

declare(strict_types=1);

function get_user(object $pdo, string $firstname){
    $query ="SELECT * FROM users WHERE firstname = :firstname;";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":firstname",$firstname);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}