<?php
include('../server/connection.php');
$stmt = $conn->prepare('SELECT * FROM employees'); // Adjust the table name as needed
$stmt->execute();
$employees = $stmt->get_result();
?>

<?php include('../admin/layouts/app.php') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employees</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="create_employee.php" class="btn btn-primary">New Employee</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <form class="d-flex" action="../admin/search_employee.php" method="GET">
                            <input class="form-control me-2" type="search" name="query_admin" placeholder="Search Employees" aria-label="Search" required>
                            <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <?php if (isset($_GET['message'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['message'] ?>
                    </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error'] ?>
                    </div>
                    <?php endif; ?>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th width="100">Status</th>
                                <th width="100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;
                            foreach ($employees as $employee) { ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo $employee['employee_name']; ?></td>
                                <td><?php echo $employee['employee_email']; ?></td>
                                <td><?php echo $employee['employee_position']; ?></td>
                                <td>
                                    <svg class="text-success-500 h-6 w-6 text-success"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </td>
                                <td>
                                    <a href="edit_employee.php?employee_id=<?php echo $employee['employee_id']; ?>">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="delete_employee.php?employee_id=<?php echo $employee['employee_id']; ?>"
                                        class="text-danger w-4 h-4 mr-1">
                                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<?php include('../admin/layouts/sidebar.php') ?>
