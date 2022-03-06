<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProtfolioItemRepository;
use Sudip\MediaUploder\Facades\MediaUploader;
use App\Http\Requests\CreateProtfolioItemRequest;
use App\Http\Requests\UpdateProtfolioItemRequest;

class ProtfolioItemController extends AppBaseController
{
    /** @var  ProtfolioItemRepository */
    private $protfolioItemRepository;

    public function __construct(ProtfolioItemRepository $protfolioItemRepo)
    {
        $this->protfolioItemRepository = $protfolioItemRepo;
    }

    /**
     * Display a listing of the ProtfolioItem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $protfolioItems = $this->protfolioItemRepository->all();

        return view('protfolio_items.index')
            ->with('protfolioItems', $protfolioItems);
    }

    /**
     * Show the form for creating a new ProtfolioItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('protfolio_items.create');
    }

    /**
     * Store a newly created ProtfolioItem in storage.
     *
     * @param CreateProtfolioItemRequest $request
     *
     * @return Response
     */
    public function store(CreateProtfolioItemRequest $request)
    {
        $input = $request->all();

        $protfolioItem = $this->protfolioItemRepository->create($input);
        if ($request->hasFile('image')) {
            $file = MediaUploader::imageUpload($request->image, 'protfolios', 1, null, [600, 600]);
            if ($file) {
                $protfolioItem->fill(['image' => $file['url']]);
            }
        }
        $protfolioItem->save();
        Flash::success('Protfolio Item saved successfully.');

        return redirect(route('protfolioItems.index'));
    }

    /**
     * Display the specified ProtfolioItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $protfolioItem = $this->protfolioItemRepository->find($id);

        if (empty($protfolioItem)) {
            Flash::error('Protfolio Item not found');

            return redirect(route('protfolioItems.index'));
        }

        return view('protfolio_items.show')->with('protfolioItem', $protfolioItem);
    }

    /**
     * Show the form for editing the specified ProtfolioItem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $protfolioItem = $this->protfolioItemRepository->find($id);

        if (empty($protfolioItem)) {
            Flash::error('Protfolio Item not found');

            return redirect(route('protfolioItems.index'));
        }

        return view('protfolio_items.edit')->with('protfolioItem', $protfolioItem);
    }

    /**
     * Update the specified ProtfolioItem in storage.
     *
     * @param int $id
     * @param UpdateProtfolioItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProtfolioItemRequest $request)
    {
        $protfolioItem = $this->protfolioItemRepository->find($id);

        if (empty($protfolioItem)) {
            Flash::error('Protfolio Item not found');

            return redirect(route('protfolioItems.index'));
        }

        $protfolioItem = $this->protfolioItemRepository->update($request->all(), $id);

        Flash::success('Protfolio Item updated successfully.');

        return redirect(route('protfolioItems.index'));
    }

    /**
     * Remove the specified ProtfolioItem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $protfolioItem = $this->protfolioItemRepository->find($id);

        if (empty($protfolioItem)) {
            Flash::error('Protfolio Item not found');

            return redirect(route('protfolioItems.index'));
        }

        $this->protfolioItemRepository->delete($id);

        Flash::success('Protfolio Item deleted successfully.');

        return redirect(route('protfolioItems.index'));
    }
}
