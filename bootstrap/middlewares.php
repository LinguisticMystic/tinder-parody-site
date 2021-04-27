<?php

use App\Controllers\DashboardController;
use App\Controllers\DislikesController;
use App\Controllers\EditGalleryController;
use App\Controllers\FavoritesController;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;
use App\Controllers\RegisterController;
use App\Controllers\ViewUserProfileController;
use App\Middlewares\AuthenticationMiddleware;
use App\Middlewares\CheckLogoutMiddleware;

return [
    DashboardController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    ProfileController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    EditGalleryController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    FavoritesController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    DislikesController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    ViewUserProfileController::class . '@index' => [
        AuthenticationMiddleware::class
    ],
    HomeController::class . '@index' => [
        CheckLogoutMiddleware::class
    ],
    RegisterController::class . '@index' => [
        CheckLogoutMiddleware::class
    ]
];