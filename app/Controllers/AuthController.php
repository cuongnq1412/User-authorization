<?php

namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Logout()
    {
        $AuthModel = new AuthModel();
        $Logout = $AuthModel->Logout();
        header('Location: ' . BASE_PATH . '/login');
    }

    public function opening()
    {
        require_once 'app/Views/includes/admin/header.php';
        require_once 'app/Views/admin/opening.php';
        require_once 'app/Views/includes/admin/footer.php';
    }
    public function Login()
    {
        if (isset($_POST['submit'])) {
            $AuthModel = new AuthModel();
            $Login = $AuthModel->Login();
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            if ($Login) {
                header('Location: ' . BASE_PATH . '/admin/opening');
            }
        }
        require_once 'app/Views/Auth/login.php';
    }
    public function LoginUser()
    {
        if (isset($_POST['submit'])) {
            $AuthModel = new AuthModel();
            $Login = $AuthModel->LoginUser();
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            if ($Login) {
                header('Location:' . BASE_PATH . '/user/index?id=' . $_SESSION['user']['id']);
            }
        }
        require_once 'app/Views/Auth/loginuser.php';
    }

    public function renderRegister()
    {
        // require_once 'app/Views/login.php';
        require_once 'app/Views/Auth/login.php';
        // require_once 'app/Views/login.php';
    }
    public function addAccount()
    {
        if (isset($_SESSION['customer']['level']) && $_SESSION['customer']['level'] == "admin") {
            require_once 'app/Views/includes/admin/header.php';
            require_once 'app/Views/admin/add-account/add-account.php';
            require_once 'app/Views/includes/admin/footer.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $AuthModel = new AuthModel();
                $Login = $AuthModel->addAccount();
            }
        } else {
            header('Location: ' . BASE_PATH . '/login');
            exit();
        }
    }
}
