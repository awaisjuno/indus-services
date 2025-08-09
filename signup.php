<?php 
    include 'config/config.php';
    include 'temp/header.php';
?>

<section class="auth-section">
    <div class="container">
        <div class="auth-form">
            <h2>Create Your Account</h2>

            <form method="POST" action="">
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name">
                    </div>
                    
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required placeholder="Enter your last name">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="tel" id="mobile" name="mobile" required placeholder="Enter your mobile number">
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email address">
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required placeholder="Create a password">
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                    </div>
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
                
                <div class="auth-footer">
                    <p>Already have an account? <a href="login.php">Log in here</a></p>
                </div>
            </form>

            <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

                $first_name       = mysqli_real_escape_string($con, trim($_POST['first_name']));
                $last_name        = mysqli_real_escape_string($con, trim($_POST['last_name']));
                $mobile           = mysqli_real_escape_string($con, trim($_POST['mobile']));
                $email            = mysqli_real_escape_string($con, trim($_POST['email']));
                $password         = trim($_POST['password']);
                $confirm_password = trim($_POST['confirm_password']);

                if ($password !== $confirm_password) {
                    echo "<script>alert('Passwords do not match'); window.location.href='signup.php';</script>";
                    exit();
                }

                $check = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
                if (mysqli_num_rows($check) > 0) {
                    echo "<script>alert('Email already exists. Try logging in.'); window.location.href='signup.php';</script>";
                    exit();
                }

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                mysqli_autocommit($con, false);
                $error = false;

                $insert_user = mysqli_query($con, "INSERT INTO user (email, password, status) 
                    VALUES ('$email', '$hashed_password', 'user')");

                if ($insert_user) {
                    $user_id = mysqli_insert_id($con);

                    $insert_detail = mysqli_query($con, "INSERT INTO user_detail (user_id, first_name, last_name, mobile) 
                        VALUES ('$user_id', '$first_name', '$last_name', '$mobile')");

                    if ($insert_detail) {
                        mysqli_commit($con);
                        echo "<script>alert('Account created successfully. Please log in.'); window.location.href='login.php';</script>";
                        exit();
                    } else {
                        $error = true;
                    }
                } else {
                    $error = true;
                }

                if ($error) {
                    mysqli_rollback($con);
                    echo "<script>alert('Something went wrong during registration. Please try again.'); window.location.href='signup.php';</script>";
                    exit();
                }
            }
            ?>
        </div>
    </div>
</section>

<?php include 'temp/footer.php'; ?>
