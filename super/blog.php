<?php
    include '../config/config.php';
    include 'temp.php';
?>

<div class="content">

    <div class="card">

        <div class="card-header">
            <h3>Add Blog</h3>
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="form-group mt-3">
                    <label for="blog_title">Blog Title</label>
                    <input type="text" class="form-input" name="blog_title" required />
                </div>

                <!-- Blog Content -->
                <div class="form-group mt-3">
                    <label for="blog_content">Blog Content</label>
                    <textarea class="form-input" name="blog_content" id="blog_content" rows="5" required></textarea>
                </div>

                <!-- Blog Image -->
                <div class="form-group mb-3">
                    <label for="blog_img">Blog Image</label>
                    <input type="file" class="form-input" name="blog_img" id="blog_img" accept="image/*">
                </div>

                <!-- Category -->
                <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <input type="text" class="form-input" name="category" id="category" placeholder="Enter category" required>
                </div>

                <!-- Published Date -->
                <div class="form-group mb-3">
                    <label for="published_date">Published Date</label>
                    <input type="datetime-local" class="form-input" name="published_date" id="published_date">
                </div>

                <!-- Submit -->
                <button type="submit" name="submit" class="btn btn-primary">Save Blog</button>

            </form>

            <?php 

                if (isset($_POST['submit'])) {

                    $blog_title = $_POST['blog_title'];
                    $blog_content   = $_POST['blog_content'];
                    $category       = $_POST['category'];
                    $published_date = $_POST['published_date'];

                    // File upload handling
                    $blog_img_path = NULL;
                    if (!empty($_FILES['blog_img']['name'])) {
                        $upload_dir = "../assets/blog/";

                        // Ensure upload directory exists
                        if (!is_dir($upload_dir)) {
                            mkdir($upload_dir, 0777, true);
                        }

                        // Create unique filename
                        $ext = pathinfo($_FILES['blog_img']['name'], PATHINFO_EXTENSION);
                        $unique_name = time() . "_" . uniqid() . "." . $ext;
                        $blog_img_path = $unique_name;

                        // Move uploaded file
                        if (!move_uploaded_file($_FILES['blog_img']['tmp_name'], $upload_dir . $unique_name)) {
                            echo "<div class='alert alert-danger'>Image upload failed!</div>";
                            $blog_img_path = NULL;
                        }
                    }

                    // Insert query (no extra comma at the end!)
                    $insert = "
                        INSERT INTO blog (blog_title,blog_content, blog_img, category, published_date)
                        VALUES (
                            '" . mysqli_real_escape_string($con, $blog_title) . "',
                            '" . mysqli_real_escape_string($con, $blog_content) . "',
                            " . ($blog_img_path ? "'" . mysqli_real_escape_string($con, $blog_img_path) . "'" : "NULL") . ",
                            '" . mysqli_real_escape_string($con, $category) . "',
                            '" . mysqli_real_escape_string($con, $published_date) . "'
                        )
                    ";

                    $run = mysqli_query($con, $insert);

                    if ($run) {
                        echo "<div class='alert alert-success'>Blog added successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
                    }
                }
                
            ?>


        </div>
    </div>

    <div class="card">

       <div class="card-header">
            <h3>All Blogs</h3>
       </div>         

       <div class="card-body">

            <table class="styled-table">

                <tr>
                    <th>Blog ID</th>
                    <th>Blog Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php 
                
                    $blog = "SELECT * FROM blog";
                    $run = mysqli_query($con, $blog);
                    while($row = mysqli_fetch_assoc($run)) {

                        echo "<tr>
                            <td>". $row['blog_id'] ."</td>
                            <td>". $row['blog_content'] ."</td>
                            <td>
                                <a href='edit_blog.php?blog_id=". $row['blog_id'] ."' class='btn btn-edit'>Edit</a>
                            </td>
                            <td>
                                <a href='delete_blog.php?blog_id=". $row['blog_id'] ."' class='btn btn-delete'>Delete</a>
                            </td>
                        </tr>";

                    }
                
                ?>

            </table>

       </div>

    </div>

</div>