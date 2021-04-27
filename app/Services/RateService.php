<?php

namespace App\Services;

use App\Models\Rating;
use App\Repositories\RatingsRepository;
use App\Repositories\UsersRepository;

class RateService
{
    private RatingsRepository $ratingsRepository;

    public function __construct(
        RatingsRepository $ratingsRepository
    )
    {
        $this->ratingsRepository = $ratingsRepository;
    }

    public function execute()
    {
        $postData = explode('-', $_POST['rate']);
        $ratedUserID = $postData[1];
        $rating = $postData[0];

        $rating = new Rating($_SESSION['auth_id'], $ratedUserID, $rating);

        $this->ratingsRepository->ratePicture($rating);
    }

}