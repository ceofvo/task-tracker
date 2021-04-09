<?php
include 'controllers/db.php';

if(isset($_POST['add-task'])){

// prepare and bind
$stmt = $conn->prepare("INSERT INTO tasks (task_name, task_date, task_status, user_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $date, $status, $userId);

// set parameters and execute
session_start(); 
$name = htmlspecialchars($_POST['task']);
$date = htmlspecialchars($_POST['date']);
$status = 'FALSE';
$userId = $_SESSION['userid'];

$val = $stmt->execute();

    //If there are no errors add data to database
    if ( empty($firstnameErr) && empty($lastnameErr) ) {

		$sql = "INSERT INTO tasks (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $password);

        if ( $stmt->execute() ) {

            header('location: login.php');
            exit();
        } else {
            $errorsdb = "Registration failed: Error connecting to server";
        }
    }

}
?>