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

return [
    ['GET', '/', [HomeController::class, 'index']],
    ['POST', '/', [HomeController::class, 'index']],
    ['POST', '/login', [LoginController::class, 'login']],
    ['POST', '/logout', [LogoutController::class, 'logout']],
    ['GET', '/register', [RegisterController::class, 'index']],
    ['POST', '/register', [RegisterController::class, 'register']],
    ['GET', '/complete', [RegistrationCompleteController::class, 'index']],
    ['GET', '/dashboard', [DashboardController::class, 'index']],
    ['GET', '/profile', [ProfileController::class, 'index']],
    ['GET', '/edit-gallery', [EditGalleryController::class, 'index']],
    ['POST', '/upload', [UploadController::class, 'upload']],
    ['POST', '/rate', [RateController::class, 'rate']],
    ['GET', '/favorites', [FavoritesController::class, 'index']],
    ['GET', '/dislikes', [DislikesController::class, 'index']],
    ['POST', '/delete', [DeletePictureController::class, 'delete']],
    ['POST', '/change-main-picture', [ChangeMainPictureController::class, 'change']],
    ['GET', '/user/{id:\d+}', [ViewUserProfileController::class, 'view']]
];