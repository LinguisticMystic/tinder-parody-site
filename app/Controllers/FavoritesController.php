<?php

namespace App\Controllers;

use App\Services\GetLikedUserPicturesService;
use Twig\Environment;

class FavoritesController
{
    private Environment $environment;
    private GetLikedUserPicturesService $service;

    public function __construct(
        Environment $environment,
        GetLikedUserPicturesService $service
    )
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function index()
    {
        $pathsToLikedPictures = $this->service->execute($_SESSION['auth_id']);

        echo $this->environment->render('favoritesView.php', [
            'likedPictures' => $pathsToLikedPictures
        ]);
    }
}