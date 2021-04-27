<?php

namespace App\Controllers;

use App\Services\GetRandomUserInfoService;
use Twig\Environment;

class DashboardController
{
    private Environment $environment;
    private GetRandomUserInfoService $service;

    public function __construct(Environment $environment, GetRandomUserInfoService $service)
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function index()
    {
        $randomUserInfo = $this->service->execute($_SESSION['auth_id']);

        $randomUserID = $randomUserInfo[0];
        $randomUsername = $randomUserInfo[1];
        $pathToRandomUserPicture = $randomUserInfo[2];

        echo $this->environment->render('dashboardView.php', [
            'randomUserID' => $randomUserID,
            'randomUsername' => $randomUsername,
            'pathToRandomUserPicture' => $pathToRandomUserPicture
        ]);
    }
}