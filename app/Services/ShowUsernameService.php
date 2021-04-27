<?php

namespace App\Services;

use App\Repositories\UsersRepository;

class ShowUsernameService
{
    private UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function execute(int $userID): ?string
    {
        return $this->usersRepository->findUsernameByID($userID);
    }
}