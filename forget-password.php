<?php 
    session_start();
    include 'config/config.php';
    include 'config/load-header.php';
    include 'temp/header.php';
?>

<section class="auth-section">
    <div class="container">
        <div class="auth-form">
            <h2>Forget Password ?</h2>

            <form method="POST">
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <button type="submit" name="btn" class="btn btn-primary btn-center">Enter</button>
            </form>

            <?php 
            
                if (isset($_POST['btn'])) {
                    // Sanitize input
                    $email = mysqli_real_escape_string($con, trim($_POST['email']));

                    // Check if email exists in user table
                    $check_query = "SELECT * FROM user WHERE email = '$email' AND is_delete = '0'";
                    $result = mysqli_query($con, $check_query);

                    if (mysqli_num_rows($result) === 1) {

                        // --- Email found, send email ---
                        $subject = "Password Reset Request - Indus Services";
                        $message = "
                            <h3>Hello,</h3>
                            <p>We received a request to reset your Indus Services account password.</p>
                            <p>If you made this request, please contact our support team to reset your password securely.</p>
                            <br>
                            <p>For security reasons, we do not share password details by email.</p>
                            <br>
                            <p>Regards,<br><b>Indus Services Team</b></p>
                        ";

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= "From: Indus Services <no-reply@indusservices.com>" . "\r\n";

                        // Send email
                        if (mail($email, $subject, $message, $headers)) {
                            echo "<script>alert('A password reset email has been sent! Please check your inbox.');</script>";
                        } else {
                            echo "<script>alert('Error sending email. Please try again later.');</script>";
                        }

                    } else {
                        // --- Email not found ---
                        echo "<script>alert('This email is not registered with us.');</script>";
                    }
                }

            ?>
        </div>
    </div>
</section>

<?php include 'temp/footer.php'; ?>
