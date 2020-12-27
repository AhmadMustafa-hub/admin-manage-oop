<?php
$conn = mysqli_connect("localhost", "root", "", "ecom6");
class Admin
{
    public $email;
    public $password;
    public $fullname;
    public  function set_admin()
    {
        $this->email = $_POST['admin_email'];
        $this->password = $_POST['admin_password'];
        $this->fullname = $_POST['admin_fullname'];
    }
    public function create_admin()
    {
        global $conn;
        $query = "insert into admin(admin_email,admin_password,admin_fullname)
             values('$this->email','$this->password','$this->fullname')";
        mysqli_query($conn, $query);
    }
    public function show_admins()
    {
        global $conn;
        $query = "select * from admin";
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
    public function edit_admins($data)
    {
        global $conn;

        $query = "update admin set admin_email    = '$this->email',
                                admin_password = '$this->password',
                                admin_fullname	      = '$this->fullname'
             where admin_id = {$data}";
        $result = mysqli_query($conn, $query);
    }
    public function delete_admin($data)
    {
        global $conn;
        $query = "delete from admin where admin_id={$data}";
        $result = mysqli_query($conn, $query);
    }
    public function show_admin_by_id($data)
    {
        global $conn;
        $query = "select * from admin where admin_id={$data}";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>