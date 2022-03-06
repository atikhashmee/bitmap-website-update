<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\SliderRepository;
use App\Http\Requests\CreateSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Controllers\AppBaseController;
use Sudip\MediaUploder\Facades\MediaUploader;

class SliderController extends AppBaseController
{
    /** @var  SliderRepository */
    private $sliderRepository;

    public function __construct(SliderRepository $sliderRepo)
    {
        $this->sliderRepository = $sliderRepo;
    }

    /**
     * Display a listing of the Slider.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sliders = $this->sliderRepository->all();

        return view('admin.sliders.index')
            ->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new Slider.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created Slider in storage.
     *
     * @param CreateSliderRequest $request
     *
     * @return Response
     */
    public function store(CreateSliderRequest $request)
    {
        $input = $request->all();

        $slider = $this->sliderRepository->create($input);
        if ($request->hasFile('image')) {
            $file = MediaUploader::imageUpload($request->image, 'sliders', 1, null, [600, 600]);
            if ($file) {
                $slider->fill(['image' => $file['url']]);
            }
        }
        $slider->save();
        Flash::success('Slider saved successfully.');

        return redirect(route('admin.sliders.index'));
    }

    /**
     * Display the specified Slider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('admin.sliders.index'));
        }

        return view('admin.sliders.show')->with('slider', $slider);
    }

    /**
     * Show the form for editing the specified Slider.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('admin.sliders.index'));
        }

        return view('admin.sliders.edit')->with('slider', $slider);
    }

    /**
     * Update the specified Slider in storage.
     *
     * @param int $id
     * @param UpdateSliderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSliderRequest $request)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('admin.sliders.index'));
        }

        $slider = $this->sliderRepository->update($request->all(), $id);

        Flash::success('Slider updated successfully.');

        return redirect(route('admin.sliders.index'));
    }

    /**
     * Remove the specified Slider from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $slider = $this->sliderRepository->find($id);

        if (empty($slider)) {
            Flash::error('Slider not found');

            return redirect(route('admin.sliders.index'));
        }

        $this->sliderRepository->delete($id);

        Flash::success('Slider deleted successfully.');

        return redirect(route('sliders.index'));
    }
}
