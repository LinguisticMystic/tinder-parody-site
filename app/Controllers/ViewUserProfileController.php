<?php

namespace App\Controllers;

use App\Services\ListGalleryService;
use App\Services\ShowUsernameService;
use Twig\Environment;

class ViewUserProfileController
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

    public function view(array $vars)
    {
        $pictures = $this->galleryService->execute($vars['id']);
        $username = $this->nameService->execute($vars['id']);

        echo $this->environment->render('userProfileView.php', [
            'pictures' => $pictures,
            'username' => $username
        ]);
    }
}