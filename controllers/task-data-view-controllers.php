<?php

// Render all task data

$userId = $_SESSION['id'];
$today = date('Y-m-d', time());;

$sql1 = "SELECT * FROM tasks where user_id=?";
$stmt = $conn->prepare($sql1); 
$stmt->bind_param('s', $userId);
$stmt->execute();
$result = $stmt->get_result();
$totalTasks = $result->num_rows;

?>