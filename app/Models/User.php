<?php

namespace App\Models;

class User
{
    private string $username;
    private string $sex;
    private ?string $password;

    public function __construct(string $username, string $sex, string $password)
    {
        $this->username = $username;
        $this->sex = $sex;
        $this->password = $password;
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