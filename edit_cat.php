<?php
include('includes/category.php');
$cat=new category();
if (isset($_POST['submit'])) {
    $cat->set_category();
    $cat->edit_category($_GET['id']);
    header("location:manage_category.php");
}

$data = new category();
$catSet = $data->show_cat_by_id($_GET['id']);


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Category</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input name="category_name" type="text" class="form-control" value="<?php echo $catSet['cat_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Descreption</label>
                                    <input name="category_desc" type="text" class="form-control" value="<?php echo $catSet['cat_desc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                    <input name="category_img" type="file" class="form-control">
                                    <?php echo "<img src='images/{$_GET['image']}' width= 100px height=100px>"; ?>
                                </div>
                                <div>
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