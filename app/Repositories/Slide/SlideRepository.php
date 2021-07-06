<?php


namespace App\Repositories\Slide;


use App\Models\Slide;
use App\Repositories\Repository;

class SlideRepository extends Repository implements SlideRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(Slide $slide)
    {
        parent::__construct($slide);
    }

}
