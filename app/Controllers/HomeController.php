<?php

namespace App\Controllers;

use Twig\Environment;

class HomeController
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function index()
    {
        echo $this->environment->render('indexView.php', [
            'errors' => $_SESSION['_flash']['errors']
        ]);
    }
}