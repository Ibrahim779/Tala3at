<?php


namespace App\Repositories\Meeting;


use App\Models\Meeting;
use App\Repositories\Repository;

class MeetingRepository extends Repository implements MeetingRepositoryInterface
{
    const PAGINATION = 10;

    public function __construct(Meeting $meeting)
    {
        parent::__construct($meeting);
    }

    public function saveData($model, $request)
    {
        // TODO: Implement saveData() method.
    }
}
