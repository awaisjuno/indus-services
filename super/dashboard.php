<?php
    include '../config/config.php';
    include 'temp.php';
?>

            <!-- Content Area -->
            <div class="content">
                <div class="page-title">
                    <h1>Dashboard Overview</h1>
                </div>

                <!-- Stats Cards -->
                <div class="card-grid">
                    <div class="card stat-card">
                        <div class="stat-icon icon-blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-info">
                            <h3>2,548</h3>
                            <p>Total Users</p>
                        </div>
                    </div>

                    <div class="card stat-card">
                        <div class="stat-icon icon-green">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-info">
                            <h3>₹4,86,200</h3>
                            <p>Total Revenue</p>
                        </div>
                    </div>

                    <div class="card stat-card">
                        <div class="stat-icon icon-orange">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-info">
                            <h3>324</h3>
                            <p>New Orders</p>
                        </div>
                    </div>

                    <div class="card stat-card">
                        <div class="stat-icon icon-red">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-info">
                            <h3>48</h3>
                            <p>Pending Tasks</p>
                        </div>
                    </div>
                </div>

                <!-- Charts and Tables Row -->
                <div class="row">
                    <div class="col-6">
                        <div class="chart-container">
                            <h3 class="section-title">Revenue Analysis</h3>
                            <div class="chart-placeholder" style="height: 300px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #777; border-radius: 8px;">
                                Revenue Chart Area
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="chart-container">
                            <h3 class="section-title">User Growth</h3>
                            <div class="chart-placeholder" style="height: 300px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #777; border-radius: 8px;">
                                User Growth Chart Area
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities Table -->
                <div class="table-container">
                    <h3 class="section-title">Recent Activities</h3>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Activity</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sarah Johnson</td>
                                <td>Updated payment information</td>
                                <td>Oct 15, 2023</td>
                                <td><span class="status status-active">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Michael Brown</td>
                                <td>Changed account settings</td>
                                <td>Oct 14, 2023</td>
                                <td><span class="status status-active">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Emily Davis</td>
                                <td>Submitted a support ticket</td>
                                <td>Oct 14, 2023</td>
                                <td><span class="status status-pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>John Wilson</td>
                                <td>Placed a new order (#1234)</td>
                                <td>Oct 13, 2023</td>
                                <td><span class="status status-active">Completed</span></td>
                            </tr>
                            <tr>
                                <td>Emma Thompson</td>
                                <td>Requested a refund</td>
                                <td>Oct 12, 2023</td>
                                <td><span class="status status-pending">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

<?php include 'footer.php';?>