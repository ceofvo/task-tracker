<?php
//Error variables
$taskDescErr = "";
$dueDateErr = "";
$taskStatusErr = "";

//hold and update user task
$taskDesc = "";
$dueDate = "";
$taskStatus = "";

// include your composer dependencies
require_once 'vendor/autoload.php';

use Unicodeveloper\Jusibe\Jusibe;

$publicKey = '';
$accessToken = '';

if(isset($_POST['add-task'])){

$userId = $_SESSION['id'];
$taskDesc = filter_var($_POST['task-desc'], FILTER_SANITIZE_STRING);
$dueDate = filter_var($_POST['due-date'], FILTER_SANITIZE_STRING);
$taskStatus = "Pending";

    //validation
    if ( empty($taskDesc) ) {
        $taskDescErr = "Task description is required";
    }
    if ( empty($dueDate) ) {
        $dueDateErr = "Due date is required";
    }

    //If there are no errors add data to database
    if ( empty($taskDescErr) && empty($dueDateErr) ) {

		$sql = "INSERT INTO tasks (user_id, task_desc, due_date, task_status) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $userId , $taskDesc, $dueDate, $taskStatus);

        if ( $stmt->execute() ) {
            $_SESSION['success'] = "You have successfully added the task.";
            $_SESSION['timeout'] = time();

            //send sms to user
            // $jusibe = new Jusibe($publicKey, $accessToken);

            // $message = "Hey " .$_SESSION['firstname']. "! Task : " . $taskDesc . " is due on " . $dueDate;

            // $payload = [
            //     'to' => '+2348090178693',
            //     'from' => 'Task Tracker',
            //     'message' => $message
            // ];

            // try {
            //     $response = $jusibe->sendSMS($payload)->getResponse();
            // } catch(Exception $e) {
            //     echo $e->getMessage();
            // }

            $taskDesc = "";
            $dueDate = "";

            header('location: view-all-task.php');
        } else {
            $errorsdb = "Request failed: Error connecting to server";
        }
    }

}

$status = array(
    '' => 'Select Option',
    'Pending' => 'Pending',
    'Done' => 'Done'
);

//Edit User Task From STEP 1 get data from db and populate
if ( isset($_GET['editid']) ) {
    $taskId = htmlspecialchars($_GET['editid']);

    $sql2 = "SELECT * FROM tasks WHERE task_id=? LIMIT 1";
    $stmt = $conn->prepare($sql2);
    $stmt->bind_param("s", $taskId); 
    $stmt->execute();
    $result = $stmt->get_result();

    if($taskItem = $result->fetch_assoc()) {
        $taskDesc = $taskItem['task_desc'];
        $dueDate = $taskItem['due_date'];
        $taskStatus = $taskItem['task_status'];
        $taskId = $taskItem['task_id'];
    }
}

//Edit User Task From STEP 2 get data from db and populate
if ( isset( $_POST['edit-task'] ) ) {
    $taskDesc = filter_var($_POST['task-desc'], FILTER_SANITIZE_STRING);
    $dueDate = filter_var($_POST['due-date'], FILTER_SANITIZE_STRING);
    $taskStatus = filter_var($_POST['task-status'], FILTER_SANITIZE_STRING);
    $taskId = filter_var($_POST['task-id'], FILTER_SANITIZE_STRING);

    //validation
    if ( $taskStatus === "" ) {
        $taskStatusErr = "Please select task status";
    }
    if ( empty($taskDesc) ) {
        $taskDescErr = "Task description is required";
    }
    if ( empty($dueDate) ) {
        $dueDateErr = "Due date is required";
    }

    //If there are no errors add data to database
    if ( empty($taskDescErr) && empty($dueDateErr) && empty($taskStatusErr) ) {

        $sql3 = "UPDATE tasks SET task_desc=?, due_date=?, task_status=? WHERE task_id=?";
        $stmt = $conn->prepare($sql3);
        $stmt->bind_param('ssss', $taskDesc, $dueDate, $taskStatus, $taskId);

        if ( $stmt->execute() ) {
            $successMessage = "You have successfully updated the task.";
        } else {
            $addErr = "Error updating the task. Please try again later";
        }
    }
}


?>