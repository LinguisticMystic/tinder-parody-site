<?php

namespace App\Controllers;

use App\Services\GetDislikedUserPicturesService;
use Twig\Environment;

class DislikesController
{
    private Environment $environment;
    private GetDislikedUserPicturesService $service;

    public function __construct(
        Environment $environment,
        GetDislikedUserPicturesService $service
    )
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function index()
    {
        $pathsToDislikedPictures = $this->service->execute($_SESSION['auth_id']);

        echo $this->environment->render('dislikesView.php', [
            'dislikedPictures' => $pathsToDislikedPictures
        ]);
    }
}