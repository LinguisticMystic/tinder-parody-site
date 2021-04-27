<?php

namespace App\Repositories;

use App\Models\Rating;
use Medoo\Medoo;

class MySQLRatingsRepository implements RatingsRepository
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

    public function ratePicture(Rating $rating): void
    {
        $this->database->insert('ratings', [
            'user_id' => $rating->userID(),
            'rated_user_id' => $rating->ratedUserID(),
            'rating' => $rating->rating(),
        ]);
    }

    public function findUsersByRating(int $userID, $rating): array
    {
        $likedUserIDArrays = $this->database->select('ratings', [
            'rated_user_id'
        ], [
            'user_id' => $userID,
            'rating' => $rating
        ]);

        $likedUserIDs=[];

        foreach ($likedUserIDArrays as $likedUserIDArray) {
            $likedUserIDs[] = $likedUserIDArray['rated_user_id'];
        }

        return $likedUserIDs;
    }

}