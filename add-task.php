<?php
    include 'header.php';
    require 'controllers/task-controllers.php';

    if ( !isset($_SESSION['id']) ) {
        header('location: login.php');
        exit();
    }
?>

    <!--Content Section-->
    <div class="app-container-outer ">
            <div class="app-row-center">
                <div class="app-col content-margin-top">
                <h1 class="text-center">Add a Task</h1>
                <form action="add-task.php" method="POST">
                <div class="mb-3">
                    <label for="task-desc" class="form-label">Task Description</label>
                    <input type="text" class="form-control" id="task-desc" name="task-desc" value="<?php echo $taskDesc ; ?>">
                    <?php if ( !empty($taskDescErr) ): ?>
                      <div class="form-errors"> <?php echo $taskDescErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="due-date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="due-date" name="due-date" value="<?php echo $dueDate ; ?>">
                    <?php if ( !empty($dueDateErr) ): ?>
                      <div class="form-errors"> <?php echo $dueDateErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Add Task" name="add-task">  
                </div>
                </form>

                </div>
            </div>
    </div>
<?php
    include 'footer.php';
?>