<?php
include('includes/customer.php');
$cust=new customer();
if (isset($_POST['submit'])) {
    $cust->set_customer();
    $cust->edit_customer($_GET['id']);
    header("location:manage_customers.php");
}

$data = new customer();
$custSet = $data->show_customer_by_id($_GET['id']);

include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Customer</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Customer</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                    <input name="customer_name" type="text" class="form-control" value="<?php echo $custSet['cust_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Email</label>
                                    <input name="customer_email" type="text" class="form-control" value="<?php echo $custSet['cust_email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Password</label>
                                    <input name="customer_password" type="password" class="form-control" value="<?php echo $custSet['cust_password'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Mobile</label>
                                    <input name="customer_mobile" type="text" class="form-control" value="<?php echo $custSet['cust_mobile'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Customer Address</label>
                                    <input name="customer_address" type="text" class="form-control" value="<?php echo $custSet['cust_address'] ?>">
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

<?php include('includes/admin_footer.php'); ?>