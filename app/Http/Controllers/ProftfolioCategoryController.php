<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProftfolioCategoryRequest;
use App\Http\Requests\UpdateProftfolioCategoryRequest;
use App\Repositories\ProftfolioCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProftfolioCategoryController extends AppBaseController
{
    /** @var  ProftfolioCategoryRepository */
    private $proftfolioCategoryRepository;

    public function __construct(ProftfolioCategoryRepository $proftfolioCategoryRepo)
    {
        $this->proftfolioCategoryRepository = $proftfolioCategoryRepo;
    }

    /**
     * Display a listing of the ProftfolioCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proftfolioCategories = $this->proftfolioCategoryRepository->all();

        return view('admin.proftfolio_categories.index')
            ->with('proftfolioCategories', $proftfolioCategories);
    }

    /**
     * Show the form for creating a new ProftfolioCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.proftfolio_categories.create');
    }

    /**
     * Store a newly created ProftfolioCategory in storage.
     *
     * @param CreateProftfolioCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProftfolioCategoryRequest $request)
    {
        $input = $request->all();

        $proftfolioCategory = $this->proftfolioCategoryRepository->create($input);

        Flash::success('Proftfolio Category saved successfully.');

        return redirect(route('admin.proftfolioCategories.index'));
    }

    /**
     * Display the specified ProftfolioCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proftfolioCategory = $this->proftfolioCategoryRepository->find($id);

        if (empty($proftfolioCategory)) {
            Flash::error('Proftfolio Category not found');

            return redirect(route('admin.proftfolioCategories.index'));
        }

        return view('admin.proftfolio_categories.show')->with('proftfolioCategory', $proftfolioCategory);
    }

    /**
     * Show the form for editing the specified ProftfolioCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proftfolioCategory = $this->proftfolioCategoryRepository->find($id);

        if (empty($proftfolioCategory)) {
            Flash::error('Proftfolio Category not found');

            return redirect(route('admin.proftfolioCategories.index'));
        }

        return view('admin.proftfolio_categories.edit')->with('proftfolioCategory', $proftfolioCategory);
    }

    /**
     * Update the specified ProftfolioCategory in storage.
     *
     * @param int $id
     * @param UpdateProftfolioCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProftfolioCategoryRequest $request)
    {
        $proftfolioCategory = $this->proftfolioCategoryRepository->find($id);

        if (empty($proftfolioCategory)) {
            Flash::error('Proftfolio Category not found');

            return redirect(route('admin.proftfolioCategories.index'));
        }

        $proftfolioCategory = $this->proftfolioCategoryRepository->update($request->all(), $id);

        Flash::success('Proftfolio Category updated successfully.');

        return redirect(route('admin.proftfolioCategories.index'));
    }

    /**
     * Remove the specified ProftfolioCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proftfolioCategory = $this->proftfolioCategoryRepository->find($id);

        if (empty($proftfolioCategory)) {
            Flash::error('Proftfolio Category not found');

            return redirect(route('admin.proftfolioCategories.index'));
        }

        $this->proftfolioCategoryRepository->delete($id);

        Flash::success('Proftfolio Category deleted successfully.');

        return redirect(route('admin.proftfolioCategories.index'));
    }
}
