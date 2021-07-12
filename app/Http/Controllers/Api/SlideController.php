<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResource;
use App\Models\Slide;
use App\Repositories\Slide\SlideRepository;
use Illuminate\Http\Request;

class SlideController extends Controller
{

    private $slideRepository;

    /**
     * SlideController constructor.
     * @param $slideRepository
     */
    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function index()
    {
        return SlideResource::collection(Slide::all());
    }

}
