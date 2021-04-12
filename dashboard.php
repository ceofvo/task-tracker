<?php
    include 'header.php';
    include 'controllers/task-data-controllers.php';

    if ( !isset($_SESSION['id']) ) {
        header('location: login.php');
        exit();
    }
?>
    <div class="app-content-in">
        <div>
            <div class="time"></div>
            <div class="date"></div>
            <div class="greet"></div>
            <div class="crypto"></div>
            <div class="button"> <a href="add-task.php">Add Task</a> </div>
        </div>
    </div>
    <!--Data Section-->
    <div class="app-container-outer">
            <div class="app-row-center">
                <div class="app-row-center-div">
                <h4 >Hey <?php echo $_SESSION['firstname'] ; ?>! Here is what is on your schedule today</h4>
                <div class="app-col-data">
                <ul class="task-data">
                <?php if ( $totalTasks === 0) : ?>
                    <li> <div class="task-li-cont"> You are on a roll. Nothing scheduled for today </div> </li>
                <?php else: ?>
                <?php while ( $row = $result->fetch_assoc() ): ?>
                    <li> 
                        <div class="task-li-cont">
                            <?php echo $row['task_desc'] ; ?>
                        </div>

                        <?php if ( $row['task_status'] === "Pending") : ?>
                        <div class="btn-pending">
                            <i class="bi bi-hourglass-top"></i> <?php echo $row['task_status'] ; ?>
                        </div>
                        <?php else: ?>
                        <div class="btn-done">
                            <i class="bi bi-check-circle"></i> <?php echo $row['task_status'] ; ?> 
                        </div>                       
                        <?php endif; ?>

                        <div class="task-li-mod">
                        <a href="edit-task.php?editid=<?php echo $row['task_id']; ?>" class="btn-edit"><i class="bi bi-pencil-square"></i> Edit </a>
                        <a href="controllers/delete-task-controllers.php?delid=<?php echo $row['task_id']; ?>" class="btn-delete"><i class="bi bi-trash"></i> Delete</a>
                        </div>
                    </li>
                <?php endwhile; ?>
                <?php endif; ?>
                </ul>
                </div>
            </div>
            </div>
    </div>
<?php
    include 'footer.php';
?>