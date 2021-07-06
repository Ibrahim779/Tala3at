<?php


namespace App\Repositories\Governorate;


use App\Models\Governorate;
use App\Repositories\Repository;

class GovernorateRepository extends Repository implements GovernorateRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(Governorate $governorate)
    {
        parent::__construct($governorate);
    }

}
