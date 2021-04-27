<?php

namespace App\Controllers;

use App\Services\ListGalleryService;
use App\Services\ShowUsernameService;
use Twig\Environment;

class ProfileController
{
    private Environment $environment;
    private ListGalleryService $galleryService;
    private ShowUsernameService $nameService;

    public function __construct(
        Environment $environment,
        ListGalleryService $galleryService,
        ShowUsernameService $nameService
    )
    {
        $this->environment = $environment;
        $this->galleryService = $galleryService;
        $this->nameService = $nameService;
    }

    public function index()
    {
        $pictures = $this->galleryService->execute($_SESSION['auth_id']);
        $username = $this->nameService->execute($_SESSION['auth_id']);

        echo $this->environment->render('profileView.php', [
            'pictures' => $pictures,
            'username' => $username
        ]);
    }
}