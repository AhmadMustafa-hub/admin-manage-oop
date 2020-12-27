<?php
include("includes/category.php");
$conn = mysqli_connect("localhost", "root", "", "ecom6");
class product extends category
{
    public $name;
    public $desc;
    public $price;
    public $category;
    public $qunty;
    public $image;
    public $tmp;
    public $path;
    public  function set_product()
    {
        $this->name    = $_POST['product_name'];
        $this->desc = $_POST['product_desc'];
        $this->price = $_POST['product_price'];
        $this->category = $_POST['cat'];
        $this->qunty = $_POST['product_qty'];
        $this->image = $_FILES['product_img']['name'];
        $this->tmp = $_FILES['product_img']['tmp_name'];
        $this->path = "images/";
    move_uploaded_file($this->tmp, $this->path . $this->image);
    }
    public function create_product()
    {
        global $conn;
        $query = "insert into products(pro_name,pro_desc,pro_price,cat_id,qty,pro_image)
             values('$this->name','$this->desc','$this->price','$this->category','$this->qunty','$this->image')";
    mysqli_query($conn, $query);
    }
    public function show_product()
    {
        global $conn;
        $query  = "select products.pro_id,products.pro_name, products.pro_desc ,products.cat_id,
        products.pro_image,products.pro_price,products.qty,
         category.cat_name
        FROM products
        INNER JOIN category ON products.cat_id=category.cat_id";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }
    public function edit_product($data)
    {
        global $conn;

        if (empty($this->image)) {
            $query = "update products set pro_name    = '$this->name',
            pro_desc = '$this->desc',
            pro_price ='$this->price',
            cat_id='$this->category',
            qty='$this->qunty'
            where pro_id = {$data}";
        } else {
            $query = "update products set pro_name    = '$this->name',
            pro_desc = '$this->desc',
            pro_price ='$this->price',
            cat_id='$this->category',
            qty='$this->qunty',
            pro_image='$this->image'

            where pro_id = {$data}";
        }
        mysqli_query($conn, $query);
    }
    public function delete_product($data)
    {
        global $conn;
        $query = "delete from products where pro_id={$data}";
        $result = mysqli_query($conn, $query);
    }
    public function show_pro_by_id($data)
    {
        global $conn;
        $query    = "select * from products where pro_id = {$data}";        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>