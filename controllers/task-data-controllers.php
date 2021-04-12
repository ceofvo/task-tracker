<?php

// User data for dashboard

$userId = $_SESSION['id'];
$today = date('Y-m-d', time());;

$sql1 = "SELECT * FROM tasks where user_id=? AND due_date=?";
$stmt = $conn->prepare($sql1); 
$stmt->bind_param('ss', $userId, $today);
$stmt->execute();
$result = $stmt->get_result();
$totalTasks = $result->num_rows;

?>