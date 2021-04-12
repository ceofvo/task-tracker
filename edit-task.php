<?php
    include 'header.php';
    require 'controllers/task-controllers.php';
?>
    <!--Form Section-->
    <div class="app-container-outer">
            <div class="app-row-center">
                <div class="app-col content-margin-top">
                <?php if ( !empty($successMessage) ): ?>
                    <div class="form-success-gen"> <?php echo $successMessage; ?> </div>
			    <?php endif; ?>
                <?php if ( !empty($addErr) ): ?>
                    <div class="form-error-gen"> <?php echo $addErr ; ?> </div>
                <?php endif; ?>
                <h1 class="text-center">Edit Task</h1>
                <form action="edit-task.php?editid=<?php echo $_GET['editid']; ?>" method="POST">
                <input type="hidden" name="task-id" value="<?php echo $taskId ;?>">
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
                    <label for="task-status" class="form-label">Task Status</label>
                    <select name="task-status" id="task-status" class="form-control">
                        <?php foreach ($status as $value => $label): ?>
                            <option value="<?php echo $value; ?>" <?php if ( $taskStatus == $value) { echo 'selected'; } ?>>
                                <?php echo $label; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <?php if ( !empty($taskStatusErr) ): ?>
                    <div class="form-errors"> <?php echo $taskStatusErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Update Task" name="edit-task">  
                </div>
                </form>

                </div>
            </div>
    </div>
<?php
    include 'footer.php';
?>