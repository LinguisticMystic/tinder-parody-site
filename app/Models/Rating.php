<?php

namespace App\Models;

class Rating
{
    private int $userID;
    private int $ratedUserID;
    private bool $rating;

    public function __construct(int $userID, int $ratedUserID, bool $rating)
    {
        $this->userID = $userID;
        $this->ratedUserID = $ratedUserID;
        $this->rating = $rating;
    }

    public function userID(): string
    {
        return $this->userID;
    }

    public function ratedUserID(): string
    {
        return $this->ratedUserID;
    }

    public function rating(): string
    {
        return $this->rating;
    }
}