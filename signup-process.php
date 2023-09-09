<?php

//
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

//directory to the database connection
$mysqli = require __DIR__ . "/database.php";
//insert data
$sql = "INSERT INTO usertable (name,department_id, email, password_hash)
        VALUES(?, ?, ?, ?)";
//prepare stmt object
$stmt = $mysqli->stmt_init();
//check if preparation is success
if ( ! $stmt->prepare($sql)) {
  die("SQL error: " . $mysqli->error);
}
//binding the user input to placeholders

$stmt->bind_param("siss",
                  $_POST["name"],
                  $_POST['department'],
                  $_POST["email"],
                  $password_hash);

if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}