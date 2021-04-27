<?php

namespace App\Repositories;

use App\Models\PictureData;
use Medoo\Medoo;

class MySQLPicturesRepository implements PicturesRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'tinder',
            'server' => 'localhost',
            'username' => $_ENV['MYSQL_USERNAME'],
            'password' => $_ENV['MYSQL_PASSWORD']
        ]);
    }

    public function addPicture(PictureData $pictureData): void
    {
        $currentUserGallery = $this->listUserPictures($pictureData->userID());
        $isMainImage = 0;

        if (empty($currentUserGallery)) {
            $isMainImage = 1;
        }

        $this->database->insert('pictures', [
            'user_id' => $pictureData->userID(),
            'path' => $pictureData->filePath(),
            'original_file_name' => $pictureData->originalFileName(),
            'is_main' => $isMainImage
        ]);
    }

    public function listUserPictures(int $userID): array
    {
        return $this->database->select('pictures', [
            'id',
            'path',
            'original_file_name',
            'is_main'
        ], [
            'user_id' => $userID
        ]);
    }

    public function getPathToMainPicture(int $userID): ?string
    {
        $path = $this->database->select('pictures', [
            'path'
        ], [
            'user_id' => $userID,
            'is_main' => 1
        ]);

        return $path[0]['path'];
    }

    public function getPathsToPictures(array $userIDs): array
    {
        $paths = $this->database->select('pictures', [
            'user_id',
            'path'
        ], [
            'user_id' => array_values($userIDs),
            'is_main' => 1
        ]);

        if (empty($paths)) {
            return [];
        }

        return $paths;
    }

    public function deletePicture(int $id): void
    {
        $this->database->delete('pictures',['id'=>$id]);
    }

    public function changeMainPicture(int $id): void
    {
        $current = $this->database->select('pictures', [
            'id'
        ], [
            'is_main' => 1
        ]);

        $this->database->update('pictures', ['is_main' => 0], ['id'=>$current[0]['id']]);
        $this->database->update('pictures', ['is_main' => 1], ['id'=>$id]);
    }

}