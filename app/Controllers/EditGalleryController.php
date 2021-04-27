<?php

namespace App\Controllers;

use App\Services\ListGalleryService;
use Twig\Environment;

class EditGalleryController
{
    private Environment $environment;
    private ListGalleryService $service;

    public function __construct(Environment $environment, ListGalleryService $service)
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function index()
    {
        $pictures = $this->service->execute($_SESSION['auth_id']);

        echo $this->environment->render('editGalleryView.php', [
            'pictures' => $pictures,
            'errors' => $_SESSION['_flash']['errors']
        ]);
    }
}