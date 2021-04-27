<?php

namespace App\Models;

class LoginRequest
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = strtolower($username);
        $this->password = $password;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }
}