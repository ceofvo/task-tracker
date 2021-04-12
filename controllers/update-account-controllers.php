<?php

//store error variables
$firstnameErr = "";
$lastnameErr = "";
$emailErr = "";
$phoneErr = "";

//hold and update user data
$firstname = "";
$lastname = "";
$email = "";
$phone = "";


if ( isset( $_SESSION['id'] ) ) {

$id = $_SESSION['id'];
$dataQuery = "SELECT * FROM users WHERE id=? LIMIT 1";
$stmt = $conn->prepare($dataQuery); 
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$firstname = $user['first_name'];
$lastname = $user['last_name'];
$email = $user['email'];
$phone = $user['phone'];

}


if ( isset( $_POST['submit-update'] ) ) {
    $firstname =  filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $id = $_SESSION['id'];

    //validation
    if ( empty($firstname) ) {
        $firstnameErr = "First name required";
    }
    if ( empty($lastname) ) {
        $lastnameErr = "Last name required";
    }
    if ( empty($email) ) {
        $emailErr = "Email required";
    }
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)  ) {
        $emailErr = "Email address is invalid";
    }
    if ( empty($phone) ) {
        $phoneErr = "Phone Number is required";
    }

   if ( empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($phoneErr) ) {
    $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, phone=?, email=? WHERE id=?"); 
    $stmt->bind_param('sssss', $firstname, $lastname, $phone, $email, $id);

    if ( $stmt->execute() ) {
        $successMessage = "Profile Updated Successfully";
    }

  } else {
        $addErr = "One or more fields have an error. Please check and try again.";
  }

    

}


?>