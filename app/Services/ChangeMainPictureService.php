<?php

namespace App\Services;

use App\Repositories\PicturesRepository;

class ChangeMainPictureService
{
    public function __construct(PicturesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $this->repository->changeMainPicture($id);
    }
}