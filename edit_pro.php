<?php
include('includes/product.php');
$pro=new product();
if (isset($_POST['submit'])) {
    $pro->set_product();
    $pro->edit_product($_GET['id']);
    header("location:manage_products.php");
}
$data2 = new product();
$proSet = $data2->show_pro_by_id($_GET['id']);


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Products</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Products</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" value="<?php echo $proSet['pro_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Descreption</label>
                                    <input name="product_desc" type="text" class="form-control" value="<?php echo $proSet['pro_desc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                    <input name="product_price" type="text" class="form-control" value="<?php echo $proSet['pro_price'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                    <input name="product_img" type="file" class="form-control" value="">
                                    <?php echo "<img src='images/{$_GET['image']}' width= 100px height=100px>"; ?>

                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Quantity</label>
                                        <input name="product_qty" type="text" class="form-control" value="<?php echo $proSet['qty'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Categrory</label>
                                        <select name="cat">
                                            <option value="">Select...</option>
                                            <?php
                                            $pro2=new category();
                                            $data=$pro2->show_category();
                                            foreach ($data as $k => $v){
                                                if ($_GET['cat'] == $v['cat_id']) {
                                                    echo "<option value='{$v['cat_id']}' selected>{$v['cat_name']}</option>";
                                                } else {
                                                    echo "<option value='{$v['cat_id']}'>{$v['cat_name']}</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                        update
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