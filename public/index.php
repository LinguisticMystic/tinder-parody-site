<?php

use App\Controllers\DashboardController;
use App\Controllers\EditGalleryController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\ProfileController;
use App\Controllers\RegisterController;
use App\Controllers\RegistrationCompleteController;
use App\Controllers\UploadController;
use App\Middlewares\AuthenticationMiddleware;
use App\Middlewares\CheckLogoutMiddleware;
use App\Repositories\MySQLUsersRepository;
use App\Repositories\UsersRepository;
use App\Services\LoginService;
use App\Services\LogoutService;
use App\Services\RegisterService;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';

session_start();

//Dotenv
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

//Twig
$loader = new FilesystemLoader('../app/Views');
$twig = new Environment($loader);

require_once '../bootstrap/router.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION['_flash'])) {
    unset ($_SESSION['_flash']);
}