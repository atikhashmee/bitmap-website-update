<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TestimonialRepository;
use Sudip\MediaUploder\Facades\MediaUploader;
use App\Http\Requests\CreateTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;

class TestimonialController extends AppBaseController
{
    /** @var  TestimonialRepository */
    private $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepo)
    {
        $this->testimonialRepository = $testimonialRepo;
    }

    /**
     * Display a listing of the Testimonial.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testimonials = $this->testimonialRepository->all();

        return view('admin.testimonials.index')
            ->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new Testimonial.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created Testimonial in storage.
     *
     * @param CreateTestimonialRequest $request
     *
     * @return Response
     */
    public function store(CreateTestimonialRequest $request)
    {
        $input = $request->all();
        $testimonial = $this->testimonialRepository->create($input);

        if ($request->hasFile('client_image')) {
            $file = MediaUploader::imageUpload($request->client_image, 'testimonial', 0);
            if ($file) {
                $testimonial->fill(['client_image' => $file['name']]);
            }
        }

        if ($request->hasFile('signature_image')) {
            $file = MediaUploader::imageUpload($request->signature_image, 'testimonial', 0);
            if ($file) {
                $testimonial->fill(['signature_image' => $file['name']]);
            }
        }
        $testimonial->save();

        Flash::success('Testimonial saved successfully.');
        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Display the specified Testimonial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testimonial = $this->testimonialRepository->find($id);
        if (empty($testimonial)) {
            Flash::error('Testimonial not found');
            return redirect(route('admin.testimonials.index'));
        }

        return view('admin.testimonials.show')->with('testimonial', $testimonial);
    }

    /**
     * Show the form for editing the specified Testimonial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialRepository->find($id);
        if (empty($testimonial)) {
            Flash::error('Testimonial not found');
            return redirect(route('admin.testimonials.index'));
        }

        return view('admin.testimonials.edit')->with('testimonial', $testimonial);
    }

    /**
     * Update the specified Testimonial in storage.
     *
     * @param int $id
     * @param UpdateTestimonialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestimonialRequest $request)
    {
        $testimonial = $this->testimonialRepository->find($id);

        $input = $request->all();

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');
            return redirect(route('admin.testimonials.index'));
        }

        if ($request->hasFile('client_image')) {
            MediaUploader::delete('testimonial', $testimonial->client_image);
            $file = MediaUploader::imageUpload($request->client_image, 'testimonial', 0);
            if ($file) {
                $input['client_image'] = $file['name'];
            }
        }

        if ($request->hasFile('signature_image')) {
            MediaUploader::delete('testimonial', $testimonial->signature_image);
            $file = MediaUploader::imageUpload($request->signature_image, 'testimonial', 0);
            if ($file) {
                $input['signature_image'] = $file['name'];
            }
        }

        $testimonial = $this->testimonialRepository->update($input, $id);
        Flash::success('Testimonial updated successfully.');
        return redirect(route('admin.testimonials.index'));
    }

    /**
     * Remove the specified Testimonial from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');
            return redirect(route('admin.testimonials.index'));
        }


        MediaUploader::delete('testimonial', $testimonial->client_image);
        MediaUploader::delete('testimonial', $testimonial->signature_image);
        
        $this->testimonialRepository->delete($id);
        Flash::success('Testimonial deleted successfully.');
        return redirect(route('admin.testimonials.index'));
    }
}
