<?php
session_start();

// session_destroy();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';

use App\Models\Database;
use App\Routing\Route;

require_once 'config/config.php';
// Các logic xử lý tiếp theo
$uri = isset($_GET['url']) ? "/" . rtrim($_GET['url'], '/') : '/index';
Route::dispatch($uri);
