<?php
include('includes/category.php');
$cat=new category();
if (isset($_POST['submit'])) {
$cat->set_category();
$cat->create_category();
}
include('includes/admin_header.php'); ?>
<!-- HEADER DESKTOP-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Category</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input name="category_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Descreption</label>
                                    <input name="category_desc" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                    <input name="category_img" type="file" class="form-control">
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
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               $cat2 = new category();
                               $data = $cat2->show_category();
                               foreach ($data as $k => $v) {
                                   echo "<tr>";
                                   echo "<td>{$v['cat_id']}</td>";
                                   echo "<td>{$v['cat_name']}</td>";
                                   echo "<td>{$v['cat_desc']}</td>";
                                   echo "<td>><img src='images/{$v['cat_image']}' width=100px height=100px></td>";
                                   echo "<td><a href='edit_cat.php?id={$v['cat_id']}&image={$v['cat_image']}' class='btn btn-primary'>Edit</a></td>";
                                   echo "<td><a href='delete_cat.php?id={$v['cat_id']}' class='btn btn-danger'>Delete</a></td>";
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