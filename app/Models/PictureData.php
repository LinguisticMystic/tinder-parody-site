<?php

namespace App\Models;

class PictureData
{
    private int $userID;
    private string $originalFileName;
    private string $filePath;

    public function __construct(int $userID, string $originalFileName, string $filePath)
    {
        $this->userID = $userID;
        $this->originalFileName = $originalFileName;
        $this->filePath = $filePath;
    }

    public function userID(): int
    {
        return $this->userID;
    }

    public function originalFileName(): string
    {
        return $this->originalFileName;
    }

    public function filePath(): string
    {
        return $this->filePath;
    }
}