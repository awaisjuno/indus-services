<?php
    
    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    
?>
    
                <div class="panel-default">
                    <div class="panel-header">
                        <h2 class="panel-title">Change Password</h2>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <div class="input-with-icon">
                                    <input type="password" class="form-control" id="currentPassword" required>
                                    <span class="input-icon" id="toggleCurrentPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <div class="input-with-icon">
                                    <input type="password" class="form-control" id="newPassword" required>
                                    <span class="input-icon" id="toggleNewPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="password-strength">
                                    <div class="password-strength-bar" id="passwordStrengthBar"></div>
                                </div>
                                <p class="form-text">Use 8 or more characters with a mix of letters, numbers & symbols</p>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Confirm New Password</label>
                                <div class="input-with-icon">
                                    <input type="password" class="form-control" id="confirmPassword" required>
                                    <span class="input-icon" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <p class="form-text" id="passwordMatchText"></p>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-block">Update Password</button>
                        </form>
                        
                        <?php
                            
                            $success_msg = $error_msg = "";
                        
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                                $user_id = $_SESSION['user_id'];
                        
                                // Capture inputs
                                $currentPassword = trim($_POST['currentPassword']);
                                $newPassword     = trim($_POST['newPassword']);
                                $confirmPassword = trim($_POST['confirmPassword']);
                        
                                // Fetch current user password from DB
                                $sql = "SELECT password FROM user WHERE user_id = '$user_id' LIMIT 1";
                                $result = mysqli_query($con, $sql);
                        
                                if ($result && mysqli_num_rows($result) === 1) {
                                    $row = mysqli_fetch_assoc($result);
                                    $hashedPassword = $row['password'];
                        
                                    // Verify current password
                                    if (password_verify($currentPassword, $hashedPassword)) {
                        
                                        // Check new and confirm match
                                        if ($newPassword === $confirmPassword) {
                        
                                            // Hash new password
                                            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        
                                            // Update query
                                            $update = "UPDATE user SET password = '$newHashedPassword' WHERE user_id = '$user_id'";
                                            if (mysqli_query($con, $update)) {
                                                $success_msg = " Password updated successfully!";
                                            } else {
                                                $error_msg = "Error updating password: " . mysqli_error($con);
                                            }
                        
                                        } else {
                                            $error_msg = "New password and confirm password do not match.";
                                        }
                        
                                    } else {
                                        $error_msg = "Current password is incorrect.";
                                    }
                                } else {
                                    $error_msg = "User not found.";
                                }
                            }
                        ?>

                    </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menu item active state
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Toggle password visibility
            function setupPasswordToggle(toggleId, inputId) {
                const toggle = document.getElementById(toggleId);
                const input = document.getElementById(inputId);
                
                toggle.addEventListener('click', function() {
                    if (input.type === 'password') {
                        input.type = 'text';
                        toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
                    } else {
                        input.type = 'password';
                        toggle.innerHTML = '<i class="fas fa-eye"></i>';
                    }
                });
            }
            
            setupPasswordToggle('toggleCurrentPassword', 'currentPassword');
            setupPasswordToggle('toggleNewPassword', 'newPassword');
            setupPasswordToggle('toggleConfirmPassword', 'confirmPassword');
            
            // Password strength indicator
            const newPassword = document.getElementById('newPassword');
            const strengthBar = document.getElementById('passwordStrengthBar');
            
            newPassword.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                
                // Check password strength
                if (password.length >= 8) strength += 1;
                if (password.match(/[a-z]+/)) strength += 1;
                if (password.match(/[A-Z]+/)) strength += 1;
                if (password.match(/[0-9]+/)) strength += 1;
                if (password.match(/[!@#$%^&*(),.?":{}|<>]+/)) strength += 1;
                
                // Update strength bar
                strengthBar.className = 'password-strength-bar';
                if (password.length === 0) {
                    strengthBar.style.width = '0';
                } else if (strength < 3) {
                    strengthBar.classList.add('strength-weak');
                } else if (strength < 5) {
                    strengthBar.classList.add('strength-medium');
                } else {
                    strengthBar.classList.add('strength-strong');
                }
            });
            
            // Password confirmation check
            const confirmPassword = document.getElementById('confirmPassword');
            const passwordMatchText = document.getElementById('passwordMatchText');
            
            confirmPassword.addEventListener('input', function() {
                if (this.value !== newPassword.value) {
                    passwordMatchText.textContent = 'Passwords do not match';
                    passwordMatchText.style.color = '#e74c3c';
                } else {
                    passwordMatchText.textContent = 'Passwords match';
                    passwordMatchText.style.color = '#2ecc71';
                }
            });
            
            // Form submission
            const form = document.getElementById('changePasswordForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic validation
                if (newPassword.value !== confirmPassword.value) {
                    alert('Passwords do not match');
                    return;
                }
                
                // Simulate form submission
                alert('Password changed successfully!');
                form.reset();
                strengthBar.className = 'password-strength-bar';
                strengthBar.style.width = '0';
                passwordMatchText.textContent = '';
            });
        });
    </script>
    
    <?php include 'footer.php';?>