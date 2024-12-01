<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\CsvModel;
use App\Models\GroupModel;

class GroupController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['customer'])) {
            header('Location: ' . BASE_PATH . '/login');
            exit(); // Dừng thực thi script
        } elseif ($_SESSION['customer']['level'] !== 'commune') {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function outputCsv()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $CsvModel = new CsvModel();
            $fileName = $CsvModel->outputCsv($id);

            // Kiểm tra kết quả và chuyển hướng lại trang trước
            if ($fileName) {
                // Quay lại trang trước đó

                // Chuyển hướng người dùng đến đường dẫn tải file CSV
                header("Location: " . BASE_PATH . "/download-csv/" . $fileName);


                // header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                echo "Đã xảy ra lỗi khi xuất file CSV.";
            }
        }
    }

    public function addGroup()
    {

        // die(123);
        require_once 'app/Views/includes/admin/header.php';
        require_once 'app/Views/admin/group/add_group.php';
        require_once 'app/Views/includes/admin/footer.php';
        if (isset($_POST['submit'])) {
            $name = $_POST["name"];
            $address = $_POST["address"];

            $GroupModel = new GroupModel();
            $addCategory = $GroupModel->addGroup($name, $address);
        }
    }
    public function listGroup()
    {

        // die(123);
        require_once 'app/Views/includes/admin/header.php';
        $GroupModel = new GroupModel();
        $Groups = $GroupModel->listGroup();
        require_once 'app/Views/admin/group/list_group.php';
        require_once 'app/Views/includes/admin/footer.php';

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $GroupModel = new GroupModel();
            $result = $GroupModel->SendDistrictGroup($id);
        }
    }
    public function detailGroup()
    {

        // die(123);
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $GroupModel = new GroupModel();
            $Groups = $GroupModel->detailGroup($id);
        }
        require_once 'app/Views/includes/admin/header.php';
        require_once 'app/Views/admin/group/detail_group.php';
        require_once 'app/Views/includes/admin/footer.php';
    }
    public function deleteGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $GroupModel = new GroupModel();
            $deleteCategory = $GroupModel->deleteGroup($id);
        } else {
            echo "ID không được truyền";
        }
    }
}
