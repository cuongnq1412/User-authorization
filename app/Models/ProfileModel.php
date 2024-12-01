<?php

namespace App\Models;

use App\Models\Database;

class ProfileModel extends BaseModel
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function getUnit()
    {
        $query = "SELECT *
        FROM unit";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getPosition()
    {
        $query = "SELECT *
        FROM position";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function getAssociation()
    {
        $level = $_SESSION['customer']['level'];
        $admin_id = $_SESSION['customer']['id'];
        $query = "SELECT *
          FROM association
          WHERE level = '$level' AND admin_id = '$admin_id'";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    public function addProfile($cccd, $name, $phone, $email, $password, $birthday, $occupation, $status, $position_id, $association_id, $address, $unit_id)
    {
        $isDataValid = true;
        if (empty($cccd) || empty($name) || empty($email) || empty($password) || empty($status)) {
            $isDataValid = false;
        }

        if ($isDataValid) {
            // $admin_id = $_SESSION['customer']['id'];
            $query = "INSERT INTO profile (`cccd`, `name`, `phone`, `email`, `password`, `birthday`, `occupation`, `status`, `position_id`,`association_id`, `address`, `unit_id`,`check_approved`) VALUES ('$cccd', '$name', '$phone', '$email', '$password', '$birthday', '$occupation', '$status', '$position_id', '$association_id', '$address', '$unit_id',0)";
            $this->db->conn->query($query);
            // echo 123;
            echo '<script>addItemSuccess("Thêm");</script>';
        } else {
            echo '<script>addItemError();</script>';
        }
    }
    function deleteProfile($id)
    {
        $query = "SELECT * FROM profile WHERE id ='$id'";
        $result = $this->db->conn->query($query);
        if ($result->num_rows == 1) {

            // Xóa các dòng trong bảng `profile` liên quan đến association_id
            $deleteProfileQuery = "DELETE FROM profile WHERE id = '$id'";
            $this->db->conn->query($deleteProfileQuery);


            // if ($this->db->conn->query($deleteProfileQuery) === TRUE) {
            //     header("Location: " . $_SERVER['HTTP_REFERER']);
            // }
        }
        echo "Không tìm thấy dữ liệu";
        exit;
    }
    public function SendDistrictProfile($id)
    {
        // Kiểm tra kết nối cơ sở dữ liệu
        if (!$this->db->conn) {
            echo '<script>addItemError("Kết nối cơ sở dữ liệu không thành công.");</script>';
            return;
        }

        // Sử dụng chuẩn bị trước (prepared statements) để cập nhật dữ liệu
        $query1 = "UPDATE profile SET check_approved = 1 WHERE id = ?";


        $stmt1 = $this->db->conn->prepare($query1);


        // Kiểm tra xem việc chuẩn bị câu lệnh có thành công không
        if ($stmt1 === false) {
            echo '<script>addItemError("Chuẩn bị câu lệnh không thành công.");</script>';
            return;
        }

        // Liên kết tham số và thực thi câu lệnh
        $stmt1->bind_param('i', $id);


        $result1 = $stmt1->execute();

        // Kiểm tra kết quả thực thi câu lệnh
        if ($result1) {
            echo '<script>addItemSuccess("Gửi thành công.");</script>';
        } else {
            echo '<script>addItemError("Cập nhật dữ liệu không thành công.");</script>';
        }

        // Đóng câu lệnh
        $stmt1->close();

        // Quay về trang trước
        echo '<script>window.history.back();</script>';
    }
}
