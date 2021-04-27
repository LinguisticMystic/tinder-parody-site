<?php

namespace App\Controllers;

use App\Models\LoginRequest;
use App\Services\LoginService;
use App\Validators\LoginValidator;

class LoginController
{
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login()
    {
        $validator = new LoginValidator($_POST);
        $_SESSION['_flash']['errors'] = $validator->validateFields();

        if (empty($_SESSION['_flash']['errors'])) {

            $request = new LoginRequest($_POST['username'], $_POST['password']);
            $this->loginService->execute($request) ? header('Location: /dashboard') : header('Location: /');

        } else {
            header('Location: /');
        }
    }
}