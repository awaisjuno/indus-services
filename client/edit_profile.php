    <?php
    
        session_start();
        include '../config/config.php';
        include '../config/session.php';
        include 'temp.php';
    
    ?>
    
    
                <div class="panel-default">
                    <div class="panel-header">
                        <h2 class="panel-title">Edit Profile</h2>
                    </div>
                    <div class="panel-body">
                        <?php if (!empty($success_msg)): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> <?= $success_msg ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($error_msg)): ?>
                            <div class="alert alert-error">
                                <i class="fas fa-exclamation-circle"></i> <?= $error_msg ?>
                            </div>
                        <?php endif; ?>
                        
                        <form id="editProfileForm" action="edit_profile.php" method="POST" enctype="multipart/form-data">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type="file" id="profile_img" name="profile_img" accept=".png, .jpg, .jpeg, .gif">
                                    <label for="profile_img"></label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('<?= base_url()?>assets/img/<?= $row['img'] ?>');"></div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= htmlspecialchars($row['first_name']) ?>" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($row['last_name']) ?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Mobile Number *</label>
                                <input type="number" class="form-control" name="mobile" value="<?= htmlspecialchars($row['mobile']) ?>" pattern="[0-9]{10}" required>
                                <p class="form-text">Enter your 10-digit mobile number without any spaces or special characters</p>
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-block">Update Profile</button>
                        </form>
                        <?php 
                        
                            if (isset($_POST['submit'])) {
                                // Sanitize inputs
                                $first_name = mysqli_real_escape_string($con, trim($_POST['first_name']));
                                $last_name  = mysqli_real_escape_string($con, trim($_POST['last_name']));
                                $mobile     = mysqli_real_escape_string($con, trim($_POST['mobile']));
                                $user_id    = $_SESSION['user_id'];
                            
                                // Handle file upload
                                $upload_dir = "../assets/img/";
                                $file_name  = $_FILES['profile_img']['name'];
                                $tmp_name   = $_FILES['profile_img']['tmp_name'];
                                $file_error = $_FILES['profile_img']['error'];
                            
                                $new_file_name = $row['img']; 
                            
                                if ($file_error === UPLOAD_ERR_OK && !empty($file_name)) {
                                    // Get file extension
                                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                                    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
                            
                                    if (in_array(strtolower($ext), $allowed_ext)) {
                                        // Rename file (to avoid conflicts)
                                        $new_file_name = "profile_" . time() . "." . $ext;
                                        $dest_path = $upload_dir . $new_file_name;
                            
                                        // Move file
                                        if (move_uploaded_file($tmp_name, $dest_path)) {
                                            // Optional: delete old image if exists
                                            if (!empty($row['img']) && file_exists($upload_dir . $row['img'])) {
                                                unlink($upload_dir . $row['img']);
                                            }
                                        } else {
                                            $error_msg = "Failed to upload image.";
                                        }
                                    } else {
                                        $error_msg = "Invalid file type. Only JPG, JPEG, PNG, GIF allowed.";
                                    }
                                }
                            
                                // Update database
                                if (empty($error_msg)) {
                                    $sql = "UPDATE user_detail 
                                            SET first_name='$first_name', last_name='$last_name', mobile='$mobile', img='$new_file_name'
                                            WHERE user_id='$user_id'";
                            
                                    if (mysqli_query($con, $sql)) {
                                        $success_msg = "Profile updated successfully!";
                                        // refresh $row data
                                        $user = "SELECT * FROM user_detail WHERE user_id='$user_id'";
                                        $run  = mysqli_query($con, $user);
                                        $row  = mysqli_fetch_assoc($run);
                                    } else {
                                        $error_msg = "Error updating profile: " . mysqli_error($con);
                                    }
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
            
            // Profile image preview
            const profileImgInput = document.getElementById('profile_img');
            const imagePreview = document.getElementById('imagePreview');
            
            profileImgInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.addEventListener('load', function() {
                        imagePreview.style.backgroundImage = `url(${this.result})`;
                    });
                    reader.readAsDataURL(file);
                }
            });
            
            // Form validation
            const form = document.getElementById('editProfileForm');
            form.addEventListener('submit', function(e) {
                const firstName = document.getElementById('first_name').value.trim();
                const lastName = document.getElementById('last_name').value.trim();
                const mobile = document.getElementById('mobile').value.trim();
                
                if (!firstName || !lastName || !mobile) {
                    e.preventDefault();
                    alert('Please fill in all required fields');
                    return;
                }
                
                const mobileRegex = /^[0-9]{10}$/;
                if (!mobileRegex.test(mobile)) {
                    e.preventDefault();
                    alert('Please enter a valid 10-digit mobile number');
                    return;
                }
            });
        });
    </script>