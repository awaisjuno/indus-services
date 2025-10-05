<?php
    include '../config/config.php';
    include 'temp.php';
?>

<div class="card">
    <div class="card-header">
        <h3>Create User & Assign Roles</h3>
    </div>

    <div class="card-body">

        <form method="POST">

            <!-- Basic User Info -->
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label>First Name</label>
                    <input type="text" class="form-input" name="first_name" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Last Name</label>
                    <input type="text" class="form-input" name="last_name" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Email</label>
                    <input type="email" class="form-input" name="email" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Username</label>
                    <input type="text" class="form-input" name="username" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Password</label>
                    <input type="password" class="form-input" name="password" required>
                </div>

                <div class="col-md-6 mt-3">
                    <label>Status</label>
                    <select class="form-input" name="status" required>
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Divider -->
            <hr class="my-4">

            <!-- Role Checkboxes -->
            <h5>Assign Permissions</h5>
            <div class="role-checkboxes mt-3">

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Dashboard"> Dashboard</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="All Orders"> All Orders</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Rescheduled Orders"> Rescheduled Orders</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Upcoming Orders"> Upcoming Orders</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="All Order Reviews"> All Order Reviews</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="All Quotes Reviews"> All Quotes Reviews</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="All Complaints"> All Complaints</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Service Category"> Service Category</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Cities List"> Cities List</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Blogs List"> Blogs List</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Discount Settings"> Discount Settings</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Buffer Time Settings"> Buffer Time Settings</label>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" name="roles[]" value="Roles"> Roles</label>
                </div>

            </div>

            <!-- Submit -->
            <div class="mt-4">
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </div>

        </form>

    </div>
</div>

<style>
.form-input {
    width: 100%;
    padding: 8px 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
.checkbox-group {
    display: inline-block;
    width: 250px;
    margin-bottom: 8px;
}
</style>
