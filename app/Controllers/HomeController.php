<?php

namespace App\Controllers;

use App\Models\HomeModel;
// use App\Models\GroupModel;

class  HomeController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_PATH . '/user/login');
            exit(); // Dừng thực thi script
        }
    }
    public function Home()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $HomeModel = new HomeModel();
            $profiles = $HomeModel->HomeProfile($id);
        }
        require_once 'app/Views/includes/admin/header.php';
        require_once 'app/Views/admin/index.php';
        require_once 'app/Views/includes/admin/footer.php';
    }
}
