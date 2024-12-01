<?php

namespace App\Models;

use App\Models\Database;

class HomeModel extends BaseModel
{
    public function HomeProfile($id)
    {
        $query = "SELECT * FROM profile WHERE id = $id"; // Sửa 'FORM' thành 'FROM'
        $check = $this->db->conn->query($query);
        if ($check && $check->num_rows > 0) { // Kiểm tra xem truy vấn có kết quả không
            $profile = $check->fetch_assoc(); // Lấy thông tin profile
            $query2 = "SELECT
                p.id,
                p.cccd,
                p.name,
                p.phone,
                p.email,
                p.password,
                p.birthday,
                p.occupation,
                p.status,
                pos.name_position,
                u.name_unit,
                p.created_at,
                p.address,
                p.check_approved
            FROM
                profile p
            LEFT JOIN
                position pos ON p.position_id = pos.id
            LEFT JOIN
                unit u ON p.unit_id = u.id
            WHERE
                p.association_id = " . $profile['association_id'];
            // Sửa 'FORM' thành 'FROM' và sửa đoạn truy vấn
            $result = $this->db->conn->query($query2);
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null; // Trường hợp không tìm thấy profile
        }
    }
}
