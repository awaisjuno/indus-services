<?php
    include '../config/config.php';
    include 'temp.php';
?>


        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Insert New City</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label class="form-label required" for="cityName">City Name</label>
                                <input type="text" id="cityName" class="form-input" name="city_name" placeholder="Enter city name">
                                <span class="form-hint">Enter the full name of the city</span>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label class="form-label required" for="cityCode">City Code</label>
                                <input type="text" name="city_code" id="cityCode" class="form-input" placeholder="Enter city code">
                                <span class="form-hint">Use 3-letter code (e.g. KHI for Karachi)</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Phase *</label>
                        <input type="text" id="phase" class="form-input" name="phase" placeholder="Enter phase">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="cityDescription">Description</label>
                        <textarea id="cityDescription" name="des" class="form-textarea" placeholder="Enter city description"></textarea>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Please ensure all required fields are filled before submitting.
                    </div>
                    
                    <div class="form-buttons">
                        <button type="button" class="btn btn-outline">Cancel</button>
                        <button type="submit" name="save" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save City
                        </button>
                    </div>
                </form>
                <?php 
                
                    if (isset($_POST['save'])) {
                        $name = mysqli_real_escape_string($con, $_POST['city_name']);
                        $code = mysqli_real_escape_string($con, $_POST['city_code']);
                        $phase = mysqli_real_escape_string($con, $_POST['phase']);
                        $des  = mysqli_real_escape_string($con, $_POST['des']);
            
                        $insert = "INSERT INTO city (city_name, city_code, phase status, is_active, is_delete) 
                                   VALUES ('$name', '$code', '$phase', '1', '1', '0')";
            
                        $run = mysqli_query($con, $insert);
            
                        if ($run) {
                            echo "<script>alert('City Added Successfully.')</script>";
                        } else {
                            echo "<script>alert('Something went wrong: " . mysqli_error($con) . "')</script>";
                        }
                    }
                
                
                ?>
            </div>
        </div>
        
        
<div class="card">
    <div class="card-header">
        <h3>Active Cities</h3>
    </div>
    
    <div class="card-body">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>City Code</th>
                    <th>City Name</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $sel = "SELECT * FROM city";
                $run = mysqli_query($con, $sel);

                if (mysqli_num_rows($run) > 0) {
                    while($row = mysqli_fetch_assoc($run)) {
                        echo "<tr>
                            <td><strong>" . $row['city_code'] . "</strong></td>
                            <td>" . $row['city_name'] . "</td>
                            <td><span class='status-badge " . 
                                ($row['is_active'] == 1 ? "status-active" : "status-inactive") . 
                            "'>" . ($row['is_active'] == 1 ? "Active" : "Inactive") . "</span></td>
                            <td><button class='btn btn-edit'>Edit</button></td>
                            <td><a href='". base_url() ."super/del_city.php?city_id=". $row['city_id'] ."' class='btn btn-delete'>Delete</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' style='text-align: center;'>No active cities found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>