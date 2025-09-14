<?php 
    session_start();
    include 'config/config.php';
    include 'temp/header.php';
?>

<section class="auth-section">
    <div class="container">
        <div class="auth-form">
            <h2>Sign In to Your Account</h2>

            <form method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
                </div>
                
                <div class="form-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <button type="submit" name="signin" class="btn btn-primary btn-center">Sign In</button>
                
                <div class="auth-footer">
                    <p>Don't have an account? <a href="signup.php">Register here</a></p>
                </div>
            </form>

            <?php 
                if (isset($_POST['signin'])) {
                    // Sanitize inputs
                    $email = mysqli_real_escape_string($con, trim($_POST['email']));
                    $password = trim($_POST['password']);

                    // Query user
                    $sql = "SELECT * FROM user WHERE email = '$email' AND is_delete = '0'";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) === 1) {
                        $user = mysqli_fetch_assoc($result);

                        // Check password
                        if (password_verify($password, $user['password'])) {
                            // Login successful
                            $_SESSION['user_id'] = $user['user_id'];
                            $_SESSION['email'] = $user['email'];
                            $_SESSION['role'] = $user['role'];

                            session_write_close();

                            if($user['role'] == 'admin') {
                                
                                echo "<script>window.open('". base_url() ."admin/dashboard.php', '_self')</script>";
                                
                            } else if($user['role'] == 'user') {
                                
                                echo "<script>window.open('". base_url() ."client/dashboard.php', '_self')</script>";
                                
                            }

                            //echo "<script>window.location.href='client/dashboard.php';</script>";
                            //exit();
                        } else {
                            echo "<script>alert('Incorrect password'); window.location.href='signin.php';</script>";
                            exit();
                        }
                    } else {
                        echo "<script>alert('Account not found'); window.location.href='signin.php';</script>";
                        exit();
                    }
                }
            ?>
        </div>
    </div>
</section>

<?php include 'temp/footer.php'; ?>
