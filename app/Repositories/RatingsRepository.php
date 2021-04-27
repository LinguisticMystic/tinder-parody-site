<?php

namespace App\Repositories;

use App\Models\Rating;

interface RatingsRepository
{
    public function ratePicture(Rating $rating): void;
    public function findUsersByRating(int $userID, $rating): array;
}