<?php

namespace App\Models;

use App\Models\Database;

class CityModel extends BaseModel
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function groupReview()
    {

        $query =
            "SELECT a.*, COUNT(p.id) AS profile_count
          FROM association a
          LEFT JOIN profile p ON p.association_id = a.id
          WHERE a.status >= '4'
          GROUP BY a.id";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function acceptGroup($id)
    {
        // Kiểm tra kết nối cơ sở dữ liệu
        if (!$this->db->conn) {
            echo '<script>addItemError("Kết nối cơ sở dữ liệu không thành công.");</script>';
            return;
        }

        // Sử dụng chuẩn bị trước (prepared statements) để cập nhật dữ liệu
        $query1 = "UPDATE profile SET check_approved = 5 WHERE association_id = ?";
        $query2 = "UPDATE association SET status = 5 WHERE id = ?";

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
            echo '<script>addItemSuccess("thành công.");</script>';
        } else {
            echo '<script>addItemError("Cập nhật dữ liệu không thành công.");</script>';
        }

        // Đóng câu lệnh
        $stmt1->close();
        $stmt2->close();

        // Quay về trang trước
        echo '<script>window.history.back();</script>';
    }
    public function refuseGroup($id)
    {
        // Kiểm tra kết nối cơ sở dữ liệu
        if (!$this->db->conn) {
            echo '<script>addItemError("Kết nối cơ sở dữ liệu không thành công.");</script>';
            return;
        }

        // Sử dụng chuẩn bị trước (prepared statements) để cập nhật dữ liệu
        $query1 = "UPDATE profile SET check_approved = 6 WHERE association_id = ?";
        $query2 = "UPDATE association SET status = 6 WHERE id = ?";

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
            echo '<script>addItemSuccess("thành công.");</script>';
        } else {
            echo '<script>addItemError("Cập nhật dữ liệu không thành công.");</script>';
        }

        // Đóng câu lệnh
        $stmt1->close();
        $stmt2->close();

        // Quay về trang trước
        echo '<script>window.history.back();</script>';
    }
    public function listaceptGroup()
    {

        $query = "SELECT a.*, COUNT(p.id) AS profile_count
          FROM association a
          LEFT JOIN profile p ON p.association_id = a.id
          WHERE a.status >= 5
          GROUP BY a.id";

        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function detailaceptGroup($id)
    {
        $query = "SELECT profile.*, position.name_position, unit.name_unit
        FROM profile
        JOIN position ON profile.position_id = position.id
        JOIN unit ON profile.unit_id = unit.id
        WHERE profile.association_id = '$id' AND profile.check_approved >= 5";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function detailaceptGroup2($id)
    {
        $query = "SELECT profile.*, position.name_position, unit.name_unit
        FROM profile
        JOIN position ON profile.position_id = position.id
        JOIN unit ON profile.unit_id = unit.id
        WHERE profile.association_id = '$id' AND profile.check_approved >= 5";
        $result = $this->db->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    // public function SendCityGroup($id)
    // {
    //     // Kiểm tra kết nối cơ sở dữ liệu
    //     if (!$this->db->conn) {
    //         echo '<script>addItemError("Kết nối cơ sở dữ liệu không thành công.");</script>';
    //         return;
    //     }

    //     // Sử dụng chuẩn bị trước (prepared statements) để cập nhật dữ liệu
    //     $query1 = "UPDATE profile SET check_approved = 4 WHERE association_id = ?";
    //     $query2 = "UPDATE association SET status = 4 WHERE id = ?";

    //     $stmt1 = $this->db->conn->prepare($query1);
    //     $stmt2 = $this->db->conn->prepare($query2);

    //     // Kiểm tra xem việc chuẩn bị câu lệnh có thành công không
    //     if ($stmt1 === false || $stmt2 === false) {
    //         echo '<script>addItemError("Chuẩn bị câu lệnh không thành công.");</script>';
    //         return;
    //     }

    //     // Liên kết tham số và thực thi câu lệnh
    //     $stmt1->bind_param('i', $id);
    //     $stmt2->bind_param('i', $id);

    //     $result1 = $stmt1->execute();
    //     $result2 = $stmt2->execute();

    //     // Kiểm tra kết quả thực thi câu lệnh
    //     if ($result1 && $result2) {
    //         echo '<script>addItemSuccess("Gửi thành công.");</script>';
    //     } else {
    //         echo '<script>addItemError("Cập nhật dữ liệu không thành công.");</script>';
    //     }

    //     // Đóng câu lệnh
    //     $stmt1->close();
    //     $stmt2->close();

    //     // Quay về trang trước
    //     echo '<script>window.history.back();</script>';
    // }
}
