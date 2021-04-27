<?php

use App\Controllers\ChangeMainPictureController;
use App\Controllers\DashboardController;
use App\Controllers\DeletePictureController;
use App\Controllers\DislikesController;
use App\Controllers\EditGalleryController;
use App\Controllers\FavoritesController;
use App\Controllers\HomeController;
use App\Controllers\RateController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\ProfileController;
use App\Controllers\RegisterController;
use App\Controllers\RegistrationCompleteController;
use App\Controllers\UploadController;
use App\Controllers\ViewUserProfileController;
use App\Repositories\MySQLPicturesRepository;
use App\Repositories\MySQLRatingsRepository;
use App\Repositories\MySQLUsersRepository;
use App\Repositories\PicturesRepository;
use App\Repositories\RatingsRepository;
use App\Repositories\UsersRepository;
use App\Services\ChangeMainPictureService;
use App\Services\DeletePictureService;
use App\Services\GetDislikedUserPicturesService;
use App\Services\GetLikedUserPicturesService;
use App\Services\GetRandomUserInfoService;
use App\Services\RateService;
use App\Services\ListGalleryService;
use App\Services\LoginService;
use App\Services\LogoutService;
use App\Services\RegisterService;
use App\Services\ShowUsernameService;
use App\Services\UploadService;

$container = new League\Container\Container;

$container->add(UsersRepository::class, MySQLUsersRepository::class);
$container->add(PicturesRepository::class, MySQLPicturesRepository::class);
$container->add(RatingsRepository::class, MySQLRatingsRepository::class);

$container->add(LoginService::class, LoginService::class)
    ->addArgument(UsersRepository::class);
$container->add(LogoutService::class, LogoutService::class);
$container->add(RegisterService::class, RegisterService::class)
    ->addArgument(UsersRepository::class);
$container->add(GetRandomUserInfoService::class, GetRandomUserInfoService::class)
    ->addArguments([UsersRepository::class, PicturesRepository::class]);
$container->add(UploadService::class, UploadService::class)
    ->addArgument(PicturesRepository::class);
$container->add(ListGalleryService::class, ListGalleryService::class)
    ->addArgument(PicturesRepository::class);
$container->add(ShowUsernameService::class, ShowUsernameService::class)
    ->addArgument(UsersRepository::class);
$container->add(RateService::class, RateService::class)
    ->addArgument(RatingsRepository::class);
$container->add(GetDislikedUserPicturesService::class, GetDislikedUserPicturesService::class)
    ->addArguments([PicturesRepository::class, RatingsRepository::class]);
$container->add(GetLikedUserPicturesService::class, GetLikedUserPicturesService::class)
    ->addArguments([PicturesRepository::class, RatingsRepository::class]);
$container->add(DeletePictureService::class, DeletePictureService::class)
    ->addArgument(PicturesRepository::class);
$container->add(ChangeMainPictureService::class, ChangeMainPictureService::class)
    ->addArgument(PicturesRepository::class);

$container->add(HomeController::class, HomeController::class)
    ->addArgument($twig);
$container->add(LoginController::class, LoginController::class)
    ->addArgument(LoginService::class);
$container->add(LogoutController::class, LogoutController::class)
    ->addArgument(LogoutService::class);
$container->add(RegisterController::class, RegisterController::class)
    ->addArguments([$twig, RegisterService::class]);
$container->add(RegistrationCompleteController::class, RegistrationCompleteController::class)
    ->addArgument($twig);
$container->add(DashboardController::class, DashboardController::class)
    ->addArguments([$twig, GetRandomUserInfoService::class]);
$container->add(ProfileController::class, ProfileController::class)
    ->addArguments([$twig, ListGalleryService::class, ShowUsernameService::class]);
$container->add(EditGalleryController::class, EditGalleryController::class)
    ->addArguments([$twig, ListGalleryService::class]);
$container->add(UploadController::class, UploadController::class)
    ->addArgument(UploadService::class);
$container->add(RateController::class, RateController::class)
    ->addArgument(RateService::class);
$container->add(FavoritesController::class, FavoritesController::class)
    ->addArguments([$twig, GetLikedUserPicturesService::class]);
$container->add(DislikesController::class, DislikesController::class)
    ->addArguments([$twig, GetDislikedUserPicturesService::class]);
$container->add(DeletePictureController::class, DeletePictureController::class)
    ->addArgument(DeletePictureService::class);
$container->add(ChangeMainPictureController::class, ChangeMainPictureController::class)
    ->addArgument(ChangeMainPictureService::class);
$container->add(ViewUserProfileController::class, ViewUserProfileController::class)
    ->addArguments([$twig, ListGalleryService::class, ShowUsernameService::class]);

return $container;