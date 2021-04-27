<?php

namespace App\Services;

use App\Models\LoginRequest;
use App\Repositories\UsersRepository;

class LoginService
{
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(LoginRequest $request): bool
    {
        $userID = $this->repository->findUserID($request->username());
        $isPasswordCorrect = password_verify($request->password(), $this->repository->findUserPassword($userID));

        if (!$userID) {
            $_SESSION['_flash']['errors']['userID'] = 'User not found';
            return false;
        }
        if (!$isPasswordCorrect) {
            $_SESSION['_flash']['errors']['userID'] = 'Wrong password';
            return false;
        } else {
            $_SESSION['auth_id'] = $userID;
            return true;
        }
    }
}