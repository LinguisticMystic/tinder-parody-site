<?php

namespace App\Services;

use App\Repositories\PicturesRepository;
use App\Repositories\RatingsRepository;

class GetLikedUserPicturesService
{
    private PicturesRepository $picturesRepository;
    private RatingsRepository $ratingsRepository;

    public function __construct(
        PicturesRepository $picturesRepository,
        RatingsRepository $ratingsRepository
    )
    {
        $this->picturesRepository = $picturesRepository;
        $this->ratingsRepository = $ratingsRepository;
    }

    public function execute(int $userID): array
    {
        $rating = 1;
        $likedUserIDs = $this->ratingsRepository->findUsersByRating($userID, $rating);

        return $this->picturesRepository->getPathsToPictures($likedUserIDs);
    }

}