<?php

namespace App\Controllers;

use App\Models\RegistrationRequest;
use App\Services\RegisterService;
use App\Validators\RegistrationValidator;
use Twig\Environment;

class RegisterController
{
    private Environment $environment;
    private RegisterService $service;

    public function __construct(Environment $environment, RegisterService $service)
    {
        $this->environment = $environment;
        $this->service = $service;
    }

    public function index()
    {
        echo $this->environment->render('registerView.php', [
            'errors' => $_SESSION['_flash']['errors']
        ]);
    }

    public function register()
    {
        $validator = new RegistrationValidator($_POST);
        $_SESSION['_flash']['errors'] = $validator->validateFields();

        if (empty($_SESSION['_flash']['errors'])) {

            $request = new RegistrationRequest($_POST['username'], $_POST['sex'], $_POST['password']);
            $this->service->execute($request) ? header('Location: /complete') : header('Location: /register');

        } else {
            header('Location: /register');
        }
    }
}