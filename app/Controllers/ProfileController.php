<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\ProfileModel;

class ProfileController extends BaseController
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

    public function addProfile()
    {
        require_once 'app/Views/includes/admin/header.php';
        $ProfileModel = new ProfileModel();
        $getUnit = $ProfileModel->getUnit();
        $getAssociation = $ProfileModel->getAssociation();
        $getPosition = $ProfileModel->getPosition();
        require_once 'app/Views/admin/profile/add_profile.php';
        require_once 'app/Views/includes/admin/footer.php';
        if (isset($_POST['submit'])) {
            $cccd = $_POST["cccd"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            $birthday = $_POST["birthday"];
            $occupation = $_POST["occupation"];
            $association_id = $_POST["association_id"];
            $status = $_POST["status"];
            $position_id = $_POST["position_id"];

            $address = $_POST["address"];
            $unit_id = $_POST["unit_id"];


            $ProfileModel = new ProfileModel();
            $addCategory = $ProfileModel->addProfile($cccd, $name, $phone, $email, $password, $birthday, $occupation, $status, $position_id, $association_id, $address, $unit_id);
        }
    }
    public function deleteProfile()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $ProfileModel = new ProfileModel();
            $deletef4 = $ProfileModel->deleteProfile($id);
        } else {
            echo "ID không được truyền";
        }
    }
    public function SendDistrictProfile()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $ProfileModel = new ProfileModel();
            $result = $ProfileModel->SendDistrictProfile($id);
        }
    }
}
