<?php

namespace App\Models;

use App\Models\Database;

class AuthModel extends BaseModel
{

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function Login()
    {
        $email = $_POST["email"];
        $password = md5($_POST["password"]);

        $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $result = $this->db->conn->query($query);
        if ($result->num_rows > 0) {
            $info = $result->fetch_assoc();
            $customerData['id'] = $info['id'];
            $customerData['name'] = $info['name'];

            $customerData['email'] = $info['email'];
            $customerData['level'] = $info['level'];
            $_SESSION['customer'] = $customerData;
            return $_SESSION['customer'];
        } else {
            // Trả về false nếu đăng nhập thất bại
            // return "Chua co session User";
        }
    }
    public function LoginUser()
    {
        $cccd = $_POST["cccd"];
        $password = md5($_POST["password"]);

        $query = "SELECT * FROM profile WHERE cccd = '$cccd' AND password = '$password'";
        $result = $this->db->conn->query($query);
        if ($result->num_rows > 0) {
            $info = $result->fetch_assoc();
            $query2 =
                "SELECT
                    p.id,
                    p.cccd,
                    p.name,
                    p.phone,
                    p.email,
                    p.password,
                    p.birthday,
                    p.occupation,
                    p.association_id,
                    p.status,
                    pos.name_position,
                    assoc.name as name_a,
                    u.name_unit,
                    p.created_at,
                    p.address,
                    p.check_approved
                FROM
                    profile p
                LEFT JOIN
                    position pos ON p.position_id = pos.id
                LEFT JOIN
                    association assoc ON p.association_id = assoc.id
                LEFT JOIN
                    unit u ON p.unit_id = u.id
                WHERE
                   p.id = " . $info['id'];
            $result2 = $this->db->conn->query($query2);
            $infoUser = $result2->fetch_assoc();
            $_SESSION['user'] = $infoUser;
            return $_SESSION['user'];
            // echo $_SESSION['user'];
        } else {
            // Trả về false nếu đăng nhập thất bại
            // return "Chua co session User";
        }
    }
    public function addAccount()
    {

        // Lấy thông tin từ form đăng ký
        $name = $_POST['name'];
        $email = $_POST['email'];
        $level = $_POST['level'];
        $password = md5($_POST['password']); // Mã hóa mật khẩu bằng MD5

        $stmt = $this->db->conn->prepare("INSERT INTO admin (name, email, password, level) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $level);

        if ($stmt->execute()) {
            echo '<script>addItemSuccess("Thêm");</script>';
        } else {
            echo '<script>addItemError();</script>';
        }


        // Đóng kết nối
        $stmt->close();
    }


    public function Logout()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        if (!isset($_SESSION['customer'])) {
            echo 'k co ss';
        }
        header("Location: login");
        exit();
    }
}
