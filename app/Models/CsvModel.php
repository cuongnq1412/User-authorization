<?php

namespace App\Models;

use App\Models\Database;

class CsvModel extends BaseModel
{
    public function outputCsv($id)
    {
        // Tạo thư mục 'downloads' nếu chưa tồn tại
        $directory = 'downloads';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        // Truy vấn dữ liệu từ cơ sở dữ liệu
        $query = "SELECT profile.*, position.name_position, unit.name_unit
    FROM profile
    JOIN position ON profile.position_id = position.id
    JOIN unit ON profile.unit_id = unit.id
    WHERE profile.association_id = '$id'";
        $result = $this->db->conn->query($query);

        if ($result->num_rows > 0) {
            // Đường dẫn và tên file CSV
            $filePath = $directory . '/dshn.csv';

            // Mở file CSV để ghi dữ liệu với mã hóa UTF-8
            $file = fopen($filePath, 'w');

            // Ghi ký tự BOM để Excel nhận diện mã hóa UTF-8
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // Lấy tên cột
            $header = array();
            while ($fieldinfo = $result->fetch_field()) {
                $header[] = $fieldinfo->name;
            }
            fputcsv($file, $header);

            // Ghi dữ liệu vào file CSV
            while ($row = $result->fetch_assoc()) {
                fputcsv($file, $row);
            }

            fclose($file);
            return $filePath; // Trả về đường dẫn đến file CSV
        } else {
            return false; // Không có dữ liệu để xuất
        }
    }
}
