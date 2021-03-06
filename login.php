<?php
    include 'header.php';
?>
    <!--Login Form Section-->
    <div class="app-container-outer">
        <div class="app-row-center">
            <div class="app-col content-margin-top">
                <h1 class="text-center">Login</h1>
                <?php if ( !empty($loginErr) ): ?>
                    <div class="alert alert-danger"> <?php echo $loginErr ; ?> </div>
                <?php endif; ?>
                <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ; ?>">
                    <?php if ( !empty($emailErr) ): ?>
                      <div class="form-errors"> <?php echo $emailErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ; ?>">
                    <?php if ( !empty($passwordErr) ): ?>
                      <div class="form-errors"> <?php echo $passwordErr; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary app-btn" value="Login" name="login-submit">  
                </div>
                </form>
                <p> Don't have an account? <a href="register.php">Register Here</a></p>
            </div>
        </div>
    </div>
<?php
    include 'footer.php';
?>