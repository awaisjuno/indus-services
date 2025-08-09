<?php include 'temp.php';?>


    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="user-info">
                <img src="https://via.placeholder.com/40" alt="User">
                <span>Admin User</span>
            </div>
        </div>

        <div class="card-container">
            <div class="card orders">
                <h3>Total Orders</h3>
                <h2>1,254</h2>
                <p><span style="color: #4CAF50;">+12%</span> from last month</p>
            </div>
            <div class="card services">
                <h3>Active Services</h3>
                <h2>48</h2>
                <p><span style="color: #2196F3;">+3</span> new this month</p>
            </div>
            <div class="card complaints">
                <h3>Open Complaints</h3>
                <h2>17</h2>
                <p><span style="color: #FF6B35;">5</span> urgent</p>
            </div>
        </div>

        <div class="content-section">
            <h2>Recent Orders</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#IN-1254</td>
                        <td>John Smith</td>
                        <td>AC Repair</td>
                        <td>12 Aug 2023</td>
                        <td>$120.00</td>
                        <td><span class="status new">New</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>#IN-1253</td>
                        <td>Sarah Johnson</td>
                        <td>Plumbing</td>
                        <td>11 Aug 2023</td>
                        <td>$85.50</td>
                        <td><span class="status processing">Processing</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>#IN-1252</td>
                        <td>Michael Brown</td>
                        <td>Electrical</td>
                        <td>10 Aug 2023</td>
                        <td>$210.00</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>#IN-1251</td>
                        <td>Emily Davis</td>
                        <td>Carpentry</td>
                        <td>9 Aug 2023</td>
                        <td>$150.00</td>
                        <td><span class="status completed">Completed</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="content-section">
            <h2>Recent Complaints</h2>
            <table>
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#CP-0254</td>
                        <td>Robert Wilson</td>
                        <td>AC Installation</td>
                        <td>13 Aug 2023</td>
                        <td><span class="status new">New</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>#CP-0253</td>
                        <td>Lisa Miller</td>
                        <td>Plumbing</td>
                        <td>12 Aug 2023</td>
                        <td><span class="status processing">In Progress</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                    <tr>
                        <td>#CP-0252</td>
                        <td>David Taylor</td>
                        <td>Electrical</td>
                        <td>10 Aug 2023</td>
                        <td><span class="status processing">In Progress</span></td>
                        <td><button class="btn btn-primary btn-sm">View</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <?php include 'footer.php';?>