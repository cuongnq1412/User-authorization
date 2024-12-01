<?php

namespace App\Controllers;

use App\Models\CityModel;
// use App\Models\GroupModel;

class  CityController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['customer'])) {
            header('Location: ' . BASE_PATH . '/login');
            exit(); // Dừng thực thi script
        } elseif ($_SESSION['customer']['level'] !== 'city') {
            header('Location: ' . BASE_PATH . '/login');
            exit();
        }
    }
    public function groupReview()
    {
        require_once 'app/Views/includes/admin/header.php';
        $CityModel = new CityModel();
        $Groups = $CityModel->groupReview();
        // die($Groups);
        require_once 'app/Views/admin/group-review-district/review_group.php';
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
            $CityModel = new CityModel();
            $Groups = $CityModel->acceptGroup($id);
        }
    }
    public function refuseGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $CityModel = new CityModel();
            $Groups = $CityModel->refuseGroup($id);
        }
    }
    public function listaceptGroup()
    {
        require_once 'app/Views/includes/admin/header.php';
        $CityModel = new CityModel();
        $Groups = $CityModel->listaceptGroup();
        require_once 'app/Views/admin/group-review-district/accept_list_group.php';
        require_once 'app/Views/includes/admin/footer.php';
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $CityModel = new CityModel();
            $Groups = $CityModel->detailaceptGroup($id);
        }
    }
    public function detailaceptGroup()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $CityModel = new CityModel();
            $Groups = $CityModel->detailaceptGroup2($id);
        }
        require_once 'app/Views/includes/admin/header.php';
        require_once 'app/Views/admin/group-review-district/detail_accept.php';
        require_once 'app/Views/includes/admin/footer.php';
    }
}
