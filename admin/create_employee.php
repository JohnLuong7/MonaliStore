<?php
include('../server/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['employee_name'];
    $email = $_POST['employee_email'];
    $password = password_hash($_POST['employee_password'], PASSWORD_DEFAULT); // Hash the password
    $position = $_POST['employee_position'];
    $role = $_POST['role'];
    $account_status = $_POST['account_status'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO employees (employee_name, employee_email, employee_password, employee_position, role, account_status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $password, $position, $role, $account_status);

    if ($stmt->execute()) {
        header("Location: list_employees.php?message=Employee added successfully");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<?php include('../admin/layouts/app.php') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Employee</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="list_employees.php" class="btn btn-secondary">Back to Employees</a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="employee_name">Name</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_email">Email</label>
                            <input type="email" class="form-control" id="employee_email" name="employee_email" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_password">Password</label>
                            <input type="password" class="form-control" id="employee_password" name="employee_password" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_position">Position</label>
                            <input type="text" class="form-control" id="employee_position" name="employee_position" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                                <option value="manager">Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="account_status">Account Status</label>
                            <select class="form-control" id="account_status" name="account_status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('../admin/layouts/sidebar.php') ?>
