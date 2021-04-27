<?php

namespace App\Models;

class UploadRequest
{
    private int $userID;
    private string $fileType;
    private string $originalFileName;
    private string $filePath;
    private string $tempName;

    public function __construct(int $userID, string $fileType, string $fileName, string $tempName)
    {
        $this->userID = $userID;
        $this->fileType = $fileType;
        $this->originalFileName = $fileName;

        $fileTypeExtension = $this->getFileTypeExtension($this->fileType);
        $this->filePath = $this->generatePath() . '.' . end($fileTypeExtension);

        $this->tempName = $tempName;
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

    public function tempName(): string
    {
        return $this->tempName;
    }

    public function fileDirectory(): string
    {
        $pathInfo = pathinfo($this->filePath);

        return $pathInfo['dirname'];
    }

    private function getFileTypeExtension(string $fileType): array
    {
        return explode('/', $fileType, 2);
    }

    public function generatePath(): string
    {
        return substr(time(), 0, 2) . '/' .
               substr(time(), 2, 2) . '/' .
               substr(time(), 4, 2) . '/' .
               substr(time(), 6);
    }
}