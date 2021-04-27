<?php

namespace App\Controllers;

use Twig\Environment;

class RegistrationCompleteController
{
    private Environment $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function index()
    {
        echo $this->environment->render('registrationCompleteView.php');
    }
}