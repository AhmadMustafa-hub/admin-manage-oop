<?php
include('includes/customer.php');
$cust = new customer();
if (isset($_POST['submit'])) {
    $cust->set_customer($_POST['submit']);
    $cust->create_customer();
}
 include('includes/admin_header.php'); ?>
            <!-- HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <div class="card">
                                    <div class="card-header">Manage Customers</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Customer</h3>
                                        </div>
                                        <hr>
                                        
                                        <form action="" method="post" novalidate="novalidate">
                                        <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                                <input  name="customer_name" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">customer Email</label>
                                                <input  name="customer_email" type="text" class="form-control">
                                            </div>
                                           <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Password</label>
                                                <input  name="customer_password" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Mobile</label>
                                                <input  name="customer_mobile" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Address</label>
                                                <input  name="customer_address" type="text" class="form-control">
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
                                    <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Address</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $cust2 = new customer();
                                            $data = $cust2->show_customer();
                                            foreach ($data as $k => $v) {
                                                echo "<tr>";
                                                echo "<td>{$v['cust_id']}</td>";
                                                echo "<td>{$v['cust_name']}</td>";
                                                echo "<td>{$v['cust_email']}</td>";
                                                echo "<td>{$v['cust_mobile']}</td>";
                                                echo "<td>{$v['cust_address']}</td>";
                                                echo "<td><a href='edit_cust.php?id={$v['cust_id']}' class='btn btn-primary'>Edit</a></td>";
                                                echo "<td><a href='delete_cust.php?id={$v['cust_id']}' class='btn btn-danger'>Delete</a></td>";
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
</div>
</div>
</div>