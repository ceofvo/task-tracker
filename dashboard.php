<?php
    include 'header.php';
?>
    <div class="app-content-in">
        <div>
            <div class="time">4:00</div>
            <div class="date">March 29, 2021</div>
            <div class="greet">Good Afternoon</div>
            <div class="crypto"></div>
            <div class="button"> <a href="login.php">Add New Task</a> </div>
        </div>
    </div>
    <!--Login Form Section-->
    <div class="app-container-outer">
            <div class="app-row-center">
                <div class="app-col">
                <h1 class="text-center">Dashboard</h1>
                <form action="register.php" method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ; ?>">
                    <?php if ( !empty($firstnameErr) ): ?>
                      <div class="form-errors"> <?php echo $firstnameErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ; ?>">
                    <?php if ( !empty($lastnameErr) ): ?>
                      <div class="form-errors"> <?php echo $lastnameErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Register" name="register-submit">  
                </div>
                </form>

                </div>
            </div>
    </div>
<?php
    include 'footer.php';
?>