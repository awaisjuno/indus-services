<?php 

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';

?>


        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1>Revenue</h1>
                </div>
                
                <div class="header-right">
                    <div class="user-profile">
                        <img src="<?= base_url()?>assets/img/<?= $row['img']?>" alt="Admin User">
                        <div class="user-info">
                            <h4><?= $row['first_name']?> <?= $row['last_name']?></h4>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>
            </header>


    <div class="content">

        <div class="panel panel-default">

            <div class="panel-heading">
                <h3>Revenue</h3>
            </div>

            <div class="panel-body">

                <form method="POST">

                    <div class="form-group">
                        <label for="month">Month of:</label>
                        <select name="month" class="form-control" required>
                            <option value="">Select Month</option>
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                            <option value="04">Apr</option>
                            <option value="05">May</option>
                            <option value="06">Jun</option>
                            <option value="07">Jul</option>
                            <option value="08">Aug</option>
                            <option value="09">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year">Year:</label>
                        <select name="year" class="form-control" required>
                            <option value="">Select Year</option>
                            <?php
                                $currentYear = date("Y");
                                for ($year = $currentYear; $year >= $currentYear - 10; $year--) {
                                    echo "<option value='$year'>$year</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <button name="submit" class="btn">Search</button>

                </form>

                <?php 
                
                    if(isset($_POST['submit'])) {

                            $month = $_POST['month'];
                            $year = $_POST['year'];

                            //Seaarch from the database table order
                            $query = "SELECT SUM(price) AS total_revenue 
                                    FROM `order` 
                                    WHERE YEAR(selected_date) = '$year' AND MONTH(selected_date) = '$month'";

                            $result = mysqli_query($con, $query);

                            if ($result) {
                                $row = mysqli_fetch_assoc($result);
                                $total_revenue = $row['total_revenue'] ?? 0;

                                echo "<p><strong>Total Revenue for $month/$year:</strong> AED " . number_format($total_revenue, 2) . "</p>";
                            }

                    }
                
                ?>


            </div>

        </div>

    </div>