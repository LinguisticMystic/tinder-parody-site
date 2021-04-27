<?php

namespace App\Repositories;

use App\Models\User;

interface UsersRepository
{
    public function addUser(User $user): void;
    public function findUserID(string $username): ?int;
    public function findUsernameByID(int $id): ?string;
    public function findUserPassword(int $userID): string;
    public function userSex(int $userID): string;
    public function pickOppositeSexUsers(int $userID, string $sex);
}