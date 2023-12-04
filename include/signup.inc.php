<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once("dbh.inc.php");
        require_once("signup_model.inc.php");
        require_once("signup_contr.inc.php");
        require_once("signup_view.inc.php");
        
        # Error Handlers

        $errors = [];
        
        if (is_input_empty($username, $email, $password)) { 
            $errors["empty_input"] = "Fill in all the fields!";
        }

        if (is_email_invalid($email) && !empty($email) ) {
            $errors["email_invalid"] = "Invalid email!";
        }
        
        if (is_username_taken($pdo,$username)) {
            $errors["username_taken"] = "Username already taken!";
        }

        if (is_email_registered($pdo,$email)) {
            $errors["email_used"] = "Email already taken!";
        }

        require_once("config_session.inc.php");

        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo,$username,$email,$password);

        header("Location: ../index.php?signup=success");
        $pdo=null;
        $stmt=null;

        die();



    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
    
} else {
    header("location: ../index.php");
    die();
}

