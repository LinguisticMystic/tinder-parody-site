<?php

namespace App\Models;

class RegistrationRequest
{
    private string $username;
    private string $sex;
    private ?string $password;

    public function __construct(string $username, string $sex, ?string $password)
    {
        $this->username = strtolower($username);
        $this->sex = $sex;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function username(): string
    {
        return $this->username;
    }

    public function sex(): string
    {
        return $this->sex;
    }

    public function password(): string
    {
        return $this->password;
    }
}