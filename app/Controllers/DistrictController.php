<?php

namespace App\Controllers;

use App\Models\DistrictModel;
use App\Models\GroupModel;

class  DistrictController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['customer'])) {
            header('Location: ' . BASE_PATH . '/login');
            exit(); // Dừng thực thi script
        } elseif ($_SESSION['customer']['level'] !== 'district') {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function groupReview()
    {
        require_once 'app/Views/includes/admin/header.php';
        $DistrictModel = new DistrictModel();
        $Groups = $DistrictModel->groupReview();
        require_once 'app/Views/admin/group-review-commune/review_group.php';
        require_once 'app/Views/includes/admin/footer.php';
        // if (isset($_POST['submit'])) {
        //     $name = $_POST["name"];
        //     $address = $_POST["address"];

        //     $GroupModel = new GroupModel();
        //     $addCategory = $GroupModel->addGroup($name, $address);
        // }
    }
    public function acceptGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $DistrictModel = new DistrictModel();
            $Groups = $DistrictModel->acceptGroup($id);
        }
    }
    public function refuseGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $DistrictModel = new DistrictModel();
            $Groups = $DistrictModel->refuseGroup($id);
        }
    }
    public function listaceptGroup()
    {
        require_once 'app/Views/includes/admin/header.php';
        $DistrictModel = new DistrictModel();
        $Groups = $DistrictModel->listaceptGroup();
        require_once 'app/Views/admin/group-review-commune/accept_list_group.php';
        require_once 'app/Views/includes/admin/footer.php';
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $DistrictModel = new DistrictModel();
            $Groups = $DistrictModel->detailaceptGroup($id);
        }
    }
    public function detailaceptGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $DistrictModel = new DistrictModel();
            $Groups = $DistrictModel->detailaceptGroup($id);
        }
        require_once 'app/Views/includes/admin/header.php';
        require_once 'app/Views/admin/group-review-commune/detail_accept.php';
        require_once 'app/Views/includes/admin/footer.php';
    }
    public function SendCityGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $DistrictModel = new DistrictModel();
            $Groups = $DistrictModel->SendCityGroup($id);
        }
    }
}
