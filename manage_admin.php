<?php
include('includes/admin.php');
include('includes/admin_header.php');
$admin = new admin();
if (isset($_POST['submit'])) {
    $admin->set_admin($_POST['submit']);
    $admin->create_admin();
}
?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                    <input name="admin_email" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                    <input name="admin_password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Full Name</label>
                                    <input name="admin_fullname" type="text" class="form-control">
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $admin2 = new admin();
                        $data = $admin2->show_admins();
                        foreach ($data as $k => $v) {
                            echo "<tr>";
                            echo "<td>{$v['admin_id']}</td>";
                            echo "<td>{$v['admin_email']}</td>";
                            echo "<td>{$v['admin_fullname']}</td>";
                            echo "<td><a href='edit_admin.php?id={$v['admin_id']}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete_admin.php?id={$v['admin_id']}' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
</div>

<?php include('includes/admin_footer.php'); ?>