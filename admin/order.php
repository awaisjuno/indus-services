<?php include 'temp.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Order Management</h1>
            <div class="user-info">
                <img src="https://via.placeholder.com/40" alt="User">
                <span>Admin User</span>
            </div>
        </div>

        <!-- Order Filter Section -->
        <div class="content-section">
            <div class="filter-container" style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <div class="search-box">
                    <input type="text" placeholder="Search orders..." style="padding: 8px 15px; border: 1px solid #ddd; border-radius: 4px; width: 300px;">
                    <button class="btn btn-primary" style="margin-left: 10px;"><i class="fas fa-search"></i> Search</button>
                </div>
                <div class="filter-options">
                    <select style="padding: 8px; border: 1px solid #ddd; border-radius: 4px; margin-right: 10px;">
                        <option>All Status</option>
                        <option>New</option>
                        <option>Processing</option>
                        <option>Completed</option>
                        <option>Cancelled</option>
                    </select>
                    <select style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                        <option>Sort By: Newest First</option>
                        <option>Oldest First</option>
                        <option>Amount: High to Low</option>
                        <option>Amount: Low to High</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Order Summary Cards -->
        <div class="card-container">
            <div class="card all-orders">
                <h3>All Orders</h3>
                <h2>1,254</h2>
                <p>Total orders received</p>
            </div>
            <div class="card pending-orders">
                <h3>Pending</h3>
                <h2>87</h2>
                <p>Awaiting processing</p>
            </div>
            <div class="card completed-orders">
                <h3>Completed</h3>
                <h2>1,120</h2>
                <p>Successfully delivered</p>
            </div>
            <div class="card cancelled-orders">
                <h3>Cancelled</h3>
                <h2>47</h2>
                <p>Refunded/Rejected</p>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="content-section">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2>All Orders</h2>
                <button class="btn btn-primary"><i class="fas fa-plus"></i> Add New Order</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#IN-1258</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <img src="https://via.placeholder.com/30" alt="User" style="border-radius: 50%; margin-right: 10px;">
                                <span>John Smith</span>
                            </div>
                        </td>
                        <td>AC Repair</td>
                        <td>15 Aug 2023</td>
                        <td>$120.00</td>
                        <td><span class="status completed">Paid</span></td>
                        <td><span class="status new">New</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #2196F3;"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #f44336;"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#IN-1257</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <img src="https://via.placeholder.com/30" alt="User" style="border-radius: 50%; margin-right: 10px;">
                                <span>Sarah Johnson</span>
                            </div>
                        </td>
                        <td>Plumbing</td>
                        <td>14 Aug 2023</td>
                        <td>$85.50</td>
                        <td><span class="status completed">Paid</span></td>
                        <td><span class="status processing">Processing</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #2196F3;"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #f44336;"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#IN-1256</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <img src="https://via.placeholder.com/30" alt="User" style="border-radius: 50%; margin-right: 10px;">
                                <span>Michael Brown</span>
                            </div>
                        </td>
                        <td>Electrical</td>
                        <td>14 Aug 2023</td>
                        <td>$210.00</td>
                        <td><span class="status processing">Pending</span></td>
                        <td><span class="status processing">Processing</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #2196F3;"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #f44336;"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#IN-1255</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <img src="https://via.placeholder.com/30" alt="User" style="border-radius: 50%; margin-right: 10px;">
                                <span>Emily Davis</span>
                            </div>
                        </td>
                        <td>Carpentry</td>
                        <td>13 Aug 2023</td>
                        <td>$150.00</td>
                        <td><span class="status completed">Paid</span></td>
                        <td><span class="status completed">Completed</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #2196F3;"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #f44336;"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>#IN-1254</td>
                        <td>
                            <div style="display: flex; align-items: center;">
                                <img src="https://via.placeholder.com/30" alt="User" style="border-radius: 50%; margin-right: 10px;">
                                <span>Robert Wilson</span>
                            </div>
                        </td>
                        <td>AC Installation</td>
                        <td>12 Aug 2023</td>
                        <td>$320.00</td>
                        <td><span class="status cancelled">Refunded</span></td>
                        <td><span class="status cancelled">Cancelled</span></td>
                        <td>
                            <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #2196F3;"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-primary btn-sm" style="background-color: #f44336;"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="pagination" style="display: flex; justify-content: space-between; margin-top: 20px;">
                <div>
                    <span>Showing 1 to 5 of 1,254 entries</span>
                </div>
                <div>
                    <button class="btn" style="margin-right: 5px;">Previous</button>
                    <button class="btn btn-primary" style="margin-right: 5px;">1</button>
                    <button class="btn" style="margin-right: 5px;">2</button>
                    <button class="btn" style="margin-right: 5px;">3</button>
                    <span style="margin-right: 5px;">...</span>
                    <button class="btn" style="margin-right: 5px;">25</button>
                    <button class="btn">Next</button>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>