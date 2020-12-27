<?php
include('includes/product.php');
$pro=new product();
if (isset($_POST['submit'])) {
$pro->set_product();
$pro->create_product();
    
}
include('includes/admin_header.php');
?>
<!-- HEADER DESKTOP-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Product</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Product</h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input name="product_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Descreption</label>
                                    <input name="product_desc" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                    <input name="product_price" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Image</label>
                                    <input name="product_img" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Quantity</label>
                                    <input name="product_qty" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Categrory</label>
                                    <select name="cat">
                                        <option value="">Select...</option>
                                        <?php

                                        $data = $pro->show_category();
                                        foreach ($data as $k => $v) {
                                            echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                                        }
                                        ?>
                                    </select>
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
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pro2 = new product();
                                $data = $pro2->show_product();
                                foreach ($data as $k => $v) {
                                    echo "<tr>";
                                    echo "<td>{$v['pro_id']}</td>";
                                    echo "<td>{$v['pro_name']}</td>";
                                    echo "<td>{$v['pro_desc']}</td>";
                                    echo "<td>{$v['pro_price']}</td>";
                                    echo "<td>><img src='images/{$v['pro_image']}' width=100px height=100px></td>";
                                    echo "<td>{$v['cat_name']}</td>";
                                    echo "<td>{$v['qty']}</td>";
                                    echo "<td><a href='edit_pro.php?id={$v['pro_id']}&image={$v['pro_image']}&cat={$v['cat_id']}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete_pro.php?id={$v['pro_id']}' class='btn btn-danger'>Delete</a></td>";
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