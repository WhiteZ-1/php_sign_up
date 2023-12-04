<?php

declare(strict_types=1);


function get_username(object $pdo,string $username){
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo,string $email){
    $query = "SELECT username FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function set_user(object $pdo,string $username,string $email, string $password){

    $query =    "INSERT INTO users (username, email , password)
                 VALUES (:username, :email, :password)";

    $option = [
        'cost'=> 12
    ];

    $hashedpwd = password_hash($password , PASSWORD_BCRYPT , $option);

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedpwd);
    $stmt->execute();
}

