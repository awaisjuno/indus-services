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
                    <h1>Order Management </h1>
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
                <h3><i class="fa-solid fa-filter"></i> Refine By</h3>
            </div>

            <div class="panel-body">

                <form action="result.php" method="POST">

                    <div class="form-row">
                        <div class="form-group col-6">
                            <?= form_label('Order Status *')?>
                            <select name="status" class="form-control" required>
                                <option value="canceled">Canceled</option>
                                <option value="unconfirmed">Un Confirmed</option>
                                <option value="completed">Completed</option>
                                <option value="not-serviced">Not Serviced</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('All Technician *')?>
                            <select class="form-control" name="technician">
                                <?php 
                                
                                    $user = "SELECT * FROM user WHERE role='technician'";
                                    $run = mysqli_query($con, $user);
                                    while($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='". $row['user_id'] ."'>". $row['email'] ."</option>";
                                    }
                                
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Service Location *') ?>
                            <select name="city" class="form-control">
                                <?php 
                                    $sel = "SELECT * FROM city";
                                    $run = mysqli_query($con, $sel);
                                    while($row = mysqli_fetch_assoc($run)) {
                                        echo "<option value='". $row['city_id'] ."'>". $row['city_name'] ."</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Appointment Date *')?>
                            <?= form_input(array('type' => 'date', 'name' => 'start_date', 'class' => 'form-control'))?>
                        </div>

                        <div class="form-group col-6">
                            <?= form_label('Starting Date *')?>
                            <?= form_input(array('type' => 'date', 'name' => 'end_date', 'class' => 'form-control'))?>
                        </div>
                    
                        <div class="form-group col-6">
                            <?= form_label('Ending Date *')?>
                            <?= form_input(array('type' => 'date', 'name' => 'end_date', 'class' => 'form-control'))?>
                        </div>
                    </div>

                    <button name="submit" class="btn">Search</button>

                </form>
                
            </div>

        </div>

        <!--Pending Orders--->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3><i class="fa fa-clock-o"></i> Pending Orders</h3>
            </div>

            <div class="panel-body">

                <table class="table" id="orders-table">
                    <tr>
                        <th><input type="checkbox" class="custom-checkbox" id="select-all"></th>
                        <th>Order Date</th>
                        <th>Service Details</th>
                        <th>Appointment Time</th>
                        <th>Customer</th>
                        <th>Support Team</th>
                        <th>Technician</th>
                        <th>Action</th>
                    </tr>

                <?php 

                $pending = "
                    SELECT 
                        o.order_id, 
                        o.code, 
                        o.selected_date, 
                        o.selected_time, 
                        o.additional, 
                        o.status, 
                        o.team_id,
                        c.first_name AS customer_first, 
                        c.last_name AS customer_last, 
                        c.mobile AS customer_mobile,
                        s.sub_category,
                        oa.user_id AS assigned_user_id,
                        t.first_name AS tech_first, 
                        t.last_name AS tech_last
                    FROM `order` o
                    LEFT JOIN user_detail c ON o.user_id = c.user_id
                    LEFT JOIN order_assign oa ON o.order_id = oa.order_id AND oa.is_active='1' AND oa.is_delete='0'
                    LEFT JOIN user_detail t ON oa.user_id = t.user_id
                    LEFT JOIN sub_category s ON o.sub_id = s.sub_id
                    WHERE o.status = 0
                    ORDER BY o.order_id DESC
                ";

                $run = mysqli_query($con, $pending);

                while ($row = mysqli_fetch_assoc($run)) {

                    // Support Team Name (team_id)
                    $team_name = '';
                    if (!empty($row['team_id'])) {
                        $team_q = "SELECT first_name, last_name FROM user_detail WHERE user_id = '{$row['team_id']}'";
                        $team_res = mysqli_query($con, $team_q);
                        if ($team_res && mysqli_num_rows($team_res) > 0) {
                            $team_data = mysqli_fetch_assoc($team_res);
                            $team_name = $team_data['first_name'] . ' ' . $team_data['last_name'];
                        }
                    }

                    echo "<tr>
                        <td><input type='checkbox' class='custom-checkbox row-checkbox'></td>
                        <td>" . htmlspecialchars($row['selected_date']) . "</td>
                        <td>
                            Order #" . htmlspecialchars($row['order_id']) . " (" . htmlspecialchars($row['code']) . ")<br>
                            <small>" . htmlspecialchars($row['sub_category']) . "</small>
                        </td>
                        <td>" . htmlspecialchars($row['selected_time']) . "</td>
                        <td>" . htmlspecialchars($row['customer_first'] . ' ' . $row['customer_last']) . "</td>
                        <td>" . htmlspecialchars($team_name) . "</td>
                        <td>";

                    if (!empty($row['assigned_user_id'])) {
                        // Technician assigned
                        echo htmlspecialchars($row['tech_first'] . ' ' . $row['tech_last']);
                    } else {
                        // Show Assign button
                        echo "<a href='assgin_order.php?order_id=" . htmlspecialchars($row['order_id']) . "' class='btn btn-assign'>Assign To</a>";
                    }

                    echo "</td>
                        <td>
                            <a href='order_details.php?order_id=" . htmlspecialchars($row['order_id']) . "' class='btn btn-details'>Order Details</a>
                        </td>
                    </tr>";
                }

                ?>
                </table>


            </div>

            <div class="panel-body">
                <div id="export-info" style="margin-bottom:10px; font-weight:bold;">No rows selected for export</div>
                <button id="excel" class="btn btn-assign">Export to Excel</button>
            </div>

        </div>

        <!-- SheetJS library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('select-all');
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    const exportButton = document.getElementById('excel');
    const exportInfo = document.getElementById('export-info');

    // ✅ Select All checkbox
    selectAllCheckbox.addEventListener('change', function() {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
            updateRowSelection(checkbox);
        });
        updateExportInfo();
    });

    // ✅ Individual row checkboxes
    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateRowSelection(checkbox);
            updateExportInfo();
            updateSelectAllCheckbox();
        });
    });

    // ✅ Export button
    exportButton.addEventListener('click', function() {
        const selectedRows = [];
        document.querySelectorAll('.row-checkbox:checked').forEach(checkbox => {
            const row = checkbox.closest('tr');
            const cells = row.querySelectorAll('td');

            // ⚡ Adjusted indices because first <td> = checkbox
            selectedRows.push({
                "Order Date": cells[1].textContent.trim(),
                "Service Details": cells[2].textContent.trim(),
                "Appointment Time": cells[3].textContent.trim(),
                "Customer": cells[4].textContent.trim(),
                "ST": cells[5].textContent.trim(),
                "Assign To": cells[6].textContent.trim()
            });
        });

        if (selectedRows.length === 0) {
            alert('Please select at least one order to export.');
            return;
        }

        exportToExcel(selectedRows);
    });

    // ✅ Highlight selected rows
    function updateRowSelection(checkbox) {
        const row = checkbox.closest('tr');
        if (checkbox.checked) {
            row.classList.add('selected');
        } else {
            row.classList.remove('selected');
        }
    }

    // ✅ Update info text
    function updateExportInfo() {
        const selectedCount = document.querySelectorAll('.row-checkbox:checked').length;
        if (selectedCount === 0) {
            exportInfo.textContent = 'No rows selected for export';
        } else {
            exportInfo.textContent = `${selectedCount} row(s) selected for export`;
        }
    }

    // ✅ Keep Select All synced
    function updateSelectAllCheckbox() {
        const total = rowCheckboxes.length;
        const checked = document.querySelectorAll('.row-checkbox:checked').length;
        if (checked === total) {
            selectAllCheckbox.checked = true;
            selectAllCheckbox.indeterminate = false;
        } else if (checked > 0) {
            selectAllCheckbox.checked = false;
            selectAllCheckbox.indeterminate = true;
        } else {
            selectAllCheckbox.checked = false;
            selectAllCheckbox.indeterminate = false;
        }
    }

    // ✅ Export to Excel
    function exportToExcel(data) {
        const worksheet = XLSX.utils.json_to_sheet(data);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Pending Orders');
        XLSX.writeFile(workbook, 'pending_orders.xlsx');
    }
});

// ✅ Date range validation
document.querySelector("form").addEventListener("submit", function(e) {
    let startDate = document.querySelector("[name='start_date']").value;
    let endDate   = document.querySelector("[name='end_date']").value;
    if ((startDate && !endDate) || (!startDate && endDate)) {
        e.preventDefault();
        alert("Please select both Starting Date and Ending Date together.");
    }
});
</script>
