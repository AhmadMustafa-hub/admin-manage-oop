<?php
$conn = mysqli_connect("localhost", "root", "", "ecom6");
class customer
{
    public $name;
    public $email;
    public $password;
    public $mobile;
    public $add;
    public  function set_customer()
    {
        $this->name = $_POST['customer_name'];
        $this->email    = $_POST['customer_email'];
        $this->password = $_POST['customer_password'];
        $this->mobile = $_POST['customer_mobile'];
        $this->add = $_POST['customer_address'];
    }
    public function create_customer()
    {
        global $conn;
        $query = "insert into customer(cust_email,cust_password,cust_name,cust_mobile,cust_address)
        values('$this->email','$this->password','$this->name','$this->mobile','$this->add')";
        mysqli_query($conn, $query);
    }
    public function show_customer()
    {
        global $conn;
        $query  = "select * from customer";
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
    public function edit_customer($data)
    {
        global $conn;

        $query = "update customer set cust_name    = '$this->name',
        cust_email = '$this->email',
        cust_password	   = '$this->password',
        cust_mobile = '$this->mobile',
        cust_address = '$this->add'

        where cust_id = {$data}";
        $result = mysqli_query($conn, $query);
    }
    public function delete_customer($data)
    {
        global $conn;
        $query = "delete from customer where cust_id={$data}";
        $result = mysqli_query($conn, $query);
    }
    public function show_customer_by_id($data)
    {
        global $conn;
        $query    = "select * from customer where cust_id = {$data}";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        return $row;
    }
}
