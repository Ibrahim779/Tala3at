<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SlideRequest;
use App\Models\Category;
use App\Models\Slide;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Slide\SlideRepository;

class SlideController extends Controller
{

    protected $slideRepository;

    public function __construct(SlideRepository $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function index()
    {
        $slides = $this->slideRepository->paginate(self::PAGINATION);

        return view('admin.slides.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slides.create');
    }

    public function store(SlideRequest $request)
    {
        $this->slideRepository->create($request->all());

        return redirect()->route('admin.slides.index');
    }

    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    public function update(Slide $slide, SlideRequest $request)
    {
        $this->slideRepository->update($slide, $request->all());

        return redirect()->route('admin.slides.index');
    }

    public function destroy(Slide $slide)
    {
        $this->slideRepository->delete($slide);

        return back();
    }


}
