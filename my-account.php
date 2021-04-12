<?php
    include 'header.php';
    include 'controllers/update-account-controllers.php';
?>
    <!--Login Form Section-->
    <div class="app-container-outer">
            <div class="app-row-center">
                <div class="app-col content-margin-top">
                <?php if ( !empty($successMessage) ): ?>
                    <div class="form-success-gen"> <?php echo $successMessage; ?> </div>
			    <?php endif; ?>
                <?php if ( !empty($addErr) ): ?>
                    <div class="form-error-gen"> <?php echo $addErr ; ?> </div>
                <?php endif; ?>
                <h1 class="text-center">My Account</h1>
                <form action="my-account.php" method="POST">
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
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ; ?>">
                    <?php if ( !empty($emailErr) ): ?>
                      <div class="form-errors"> <?php echo $emailErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ; ?>">
                    <?php if ( !empty($phoneErr) ): ?>
                      <div class="form-errors"> <?php echo $phoneErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Update Account" name="submit-update">  
                </div>
                </form>

                </div>
            </div>
    </div>
<?php
    include 'footer.php';
?>