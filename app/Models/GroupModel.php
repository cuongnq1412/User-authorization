<?php

namespace App\Models;

use App\Models\Database;

class GroupModel extends BaseModel
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function addGroup($name, $address)
    {
        $isDataValid = true;
        if (empty($name) || empty($address)) {
            $isDataValid = false;
        }
        if ($isDataValid) {
            $admin_id = $_SESSION['customer']['id'];
            $query = "INSERT INTO association (`name`, `level`,`admin_id`,`address`,`status`)
            VALUES ('$name', 'commune','$admin_id','$address',0)";
            $this->db->conn->query($query);
            // die($query);

            echo '<script>addItemSuccess("Thêm");</script>';
        } else {
            echo '<script>addItemError();</script>';
        }
    }
    public function listGroup()
    {
        $admin_id = $_SESSION['customer']['id'];
        $query = "SELECT a.*, COUNT(p.id) AS profile_count
          FROM association a
          LEFT JOIN profile p ON p.association_id = a.id
          WHERE a.admin_id = '$admin_id'
          GROUP BY a.id";

        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function detailGroup($id)
    {
        $query = "SELECT profile.*, position.name_position, unit.name_unit
        FROM profile
        JOIN position ON profile.position_id = position.id
        JOIN unit ON profile.unit_id = unit.id
        WHERE profile.association_id = '$id'";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    function deleteGroup($id)
    {
        $query = "SELECT * FROM association WHERE id ='$id'";
        $result = $this->db->conn->query($query);
        if ($result->num_rows == 1) {

            // Xóa các dòng trong bảng `profile` liên quan đến association_id
            $deleteProfileQuery = "DELETE FROM profile WHERE association_id = '$id'";
            $this->db->conn->query($deleteProfileQuery);

            // Sau đó, xóa dòng trong bảng `association`
            $deleteAssociationQuery = "DELETE FROM association WHERE id = '$id'";
            $this->db->conn->query($deleteAssociationQuery);


            if ($this->db->conn->query($deleteAssociationQuery) === TRUE) {
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
        }
        echo "Không tìm thấy dữ liệu";
        exit;
    }
    public function SendDistrictGroup($id)
    {
        // Kiểm tra kết nối cơ sở dữ liệu
        if (!$this->db->conn) {
            echo '<script>addItemError("Kết nối cơ sở dữ liệu không thành công.");</script>';
            return;
        }

        // Sử dụng chuẩn bị trước (prepared statements) để cập nhật dữ liệu
        $query1 = "UPDATE profile SET check_approved = 1 WHERE association_id = ?";
        $query2 = "UPDATE association SET status = 1 WHERE id = ?";

        $stmt1 = $this->db->conn->prepare($query1);
        $stmt2 = $this->db->conn->prepare($query2);

        // Kiểm tra xem việc chuẩn bị câu lệnh có thành công không
        if ($stmt1 === false || $stmt2 === false) {
            echo '<script>addItemError("Chuẩn bị câu lệnh không thành công.");</script>';
            return;
        }

        // Liên kết tham số và thực thi câu lệnh
        $stmt1->bind_param('i', $id);
        $stmt2->bind_param('i', $id);

        $result1 = $stmt1->execute();
        $result2 = $stmt2->execute();

        // Kiểm tra kết quả thực thi câu lệnh
        if ($result1 && $result2) {
            echo '<script>addItemSuccess("Gửi thành công.");</script>';
        } else {
            echo '<script>addItemError("Cập nhật dữ liệu không thành công.");</script>';
        }

        // Đóng câu lệnh
        $stmt1->close();
        $stmt2->close();

        // Quay về trang trước
        echo '<script>window.history.back();</script>';
    }
}
