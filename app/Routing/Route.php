<?php

namespace App\Routing;

// use App\Models\Database;

class Route
{
    private static $routes = [];

    public static function showRoutes()
    {
        return self::$routes;
    }

    public static function add($uri, $controller)
    {
        $uri = "#^" . $uri . "$#";
        self::$routes[] = ['uri' => $uri, 'controller' => $controller];
    }

    // public static function dispatch($uri)
    // {
    //     foreach (self::$routes as $route) {
    //         if (preg_match($route['uri'], $uri, $matches)) {
    //             if (count($matches) > 0) {
    //                 list($controller, $method) = explode('@', $route['controller']);
    //                 $controllerClass = 'App\Controllers\\' . $controller;
    //                 $controllerInstance = new $controllerClass();
    //                 $controllerInstance->$method();
    //                 return;
    //             }
    //         }
    //     }
    //     echo '404 Not Found';
    // }

    public static function dispatch($uri)
    {
        foreach (self::$routes as $route) {
            if (preg_match($route['uri'], $uri, $matches)) {
                if (count($matches) > 0) {
                    list($controller, $method) = explode('@', $route['controller']);
                    $controllerClass = 'App\Controllers\\' . $controller;
                    $controllerInstance = new $controllerClass();

                    // Lấy tham số từ $matches và truyền vào phương thức gọi
                    $params = array_slice($matches, 1); // Bỏ qua phần đầu tiên của $matches
                    call_user_func_array([$controllerInstance, $method], $params);
                    return;
                }
            }
        }
        echo '404 Not Found';
    }
}


Route::add('/login', 'AuthController@Login'); //ok
Route::add('/user/login', 'AuthController@LoginUser'); //ok
Route::add('/admin/login', 'AuthController@Login'); //ok




Route::add('/user/index', 'HomeController@Home');
// Route::add('/admin', 'DashboardController@Dashboard');

Route::add('/admin/group/add', 'GroupController@addGroup');
Route::add('/admin/group/list', 'GroupController@listGroup');
Route::add('/admin/group/detail', 'GroupController@detailGroup');

Route::add('/admin/group/delete', 'GroupController@deleteGroup');

Route::add('/admin/profile/add', 'ProfileController@addProfile');
Route::add('/admin/profile/delete', 'ProfileController@deleteProfile');
Route::add('/admin/profile/sendDistrict', 'ProfileController@SendDistrictProfile');

Route::add('/admin/commune-review', 'DistrictController@groupReview');
Route::add('/admin/commune-review/accept', 'DistrictController@acceptGroup');
Route::add('/admin/commune-review/refuse', 'DistrictController@refuseGroup');
Route::add('/admin/commune-review/list-accept', 'DistrictController@listaceptGroup');
Route::add('/admin/commune-review/detail-accept', 'DistrictController@detailaceptGroup');
Route::add('/admin/commune-review/send', 'DistrictController@SendCityGroup');

Route::add('/admin/district-review', 'CityController@groupReview');
Route::add('/admin/district-review/accept', 'CityController@acceptGroup');
Route::add('/admin/district-review/refuse', 'CityController@refuseGroup');
Route::add('/admin/district-review/list-accept', 'CityController@listaceptGroup');
Route::add('/admin/district-review/detail-accept', 'CityController@detailaceptGroup');



Route::add('/admin/add-account', 'AuthController@addAccount');
Route::add('/admin/opening', 'AuthController@opening');

Route::add('/admin/group/csv', 'GroupController@outputCsv');
Route::add('/download-csv/downloads/(.*)', 'FileController@downloadCsv');



Route::add('/admin/logout', 'AuthController@Logout');
