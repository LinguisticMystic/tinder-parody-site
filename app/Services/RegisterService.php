<?php

namespace App\Services;

use App\Models\RegistrationRequest;
use App\Models\User;
use App\Repositories\UsersRepository;

class RegisterService
{
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(RegistrationRequest $request): bool
    {
        $newUser = new User($request->username(), $request->sex(), $request->password());

        if ($this->repository->usernameExists($newUser->username())) {
            $_SESSION['_flash']['errors']['username'] = 'User already exists';
            return false;
        } else {
            $this->repository->addUser($newUser);
            return true;
        }
    }
}