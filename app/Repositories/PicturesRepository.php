<?php

namespace App\Repositories;

use App\Models\PictureData;

interface PicturesRepository
{
    public function addPicture(PictureData $pictureData): void;
    public function listUserPictures(int $userID): array;
    public function getPathToMainPicture(int $userID): ?string;
    public function getPathsToPictures(array $userIDs): array;
    public function deletePicture(int $id): void;
    public function changeMainPicture(int $id): void;
}