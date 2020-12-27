<?php
$conn = mysqli_connect("localhost", "root", "", "ecom6");
class category
{
    public $name;
    public $desc;
    public $image;
    public $tmp;
    public $path;
    public  function set_category()
    {
    $this->name    = $_POST['category_name'];
    $this->desc = $_POST['category_desc'];
    $this->image = $_FILES['category_img']['name'];
    $this->tmp = $_FILES['category_img']['tmp_name'];
    $this->path = "images/";
    move_uploaded_file($this->tmp, $this->path . $this->image);
    }
    public function create_category()
    {
        global $conn;
        $query = "insert into category(cat_name,cat_desc,cat_image)
        values('$this->name','$this->desc','$this->image')";
        mysqli_query($conn, $query);
    }
    public function show_category()
    {
        global $conn;
        $query = "select * from category";
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
    public function edit_category($data)
    {
        global $conn;

        if (empty($this->image)) {
            $query = "update category set cat_name    = '$this->name',
            cat_desc = '$this->desc'
            where cat_id = {$data}";
        } else {
            $query = "update category set cat_name    = '$this->name',
                                    cat_desc = '$this->desc',
                                    cat_image='$this->image'
                                    where cat_id = {$data}";
        }
        mysqli_query($conn, $query);
    }
    public function delete_category($data)
    {
        global $conn;
        $query = "delete from category where cat_id={$data}";
        $result = mysqli_query($conn, $query);
    }
    public function show_cat_by_id($data)
    {
        global $conn;
        $query = "select * from category where cat_id={$data}";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>