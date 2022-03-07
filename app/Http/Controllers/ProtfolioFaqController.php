<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProtfolioFaqRequest;
use App\Http\Requests\UpdateProtfolioFaqRequest;
use App\Repositories\ProtfolioFaqRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProtfolioFaqController extends AppBaseController
{
    /** @var  ProtfolioFaqRepository */
    private $protfolioFaqRepository;

    public function __construct(ProtfolioFaqRepository $protfolioFaqRepo)
    {
        $this->protfolioFaqRepository = $protfolioFaqRepo;
    }

    /**
     * Display a listing of the ProtfolioFaq.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $protfolioFaqs = $this->protfolioFaqRepository->all();

        return view('admin.protfolio_faqs.index')
            ->with('protfolioFaqs', $protfolioFaqs);
    }

    /**
     * Show the form for creating a new ProtfolioFaq.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.protfolio_faqs.create');
    }

    /**
     * Store a newly created ProtfolioFaq in storage.
     *
     * @param CreateProtfolioFaqRequest $request
     *
     * @return Response
     */
    public function store(CreateProtfolioFaqRequest $request)
    {
        $input = $request->all();
        $input['protfolio_item_id'] = request()->route('protfolio_id');
        $protfolioFaq = $this->protfolioFaqRepository->create($input);

        Flash::success('Protfolio Faq saved successfully.');

        return redirect(route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]));
    }

    /**
     * Display the specified ProtfolioFaq.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $protfolioFaq = $this->protfolioFaqRepository->find($id);

        if (empty($protfolioFaq)) {
            Flash::error('Protfolio Faq not found');

            return redirect(route('admin.protfolio.protfolioFaqs.index'));
        }

        return view('admin.protfolio_faqs.show')->with('protfolioFaq', $protfolioFaq);
    }

    /**
     * Show the form for editing the specified ProtfolioFaq.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($protfolio_id, $protfolioFaq_id)
    {
        $protfolioFaq = $this->protfolioFaqRepository->find($protfolioFaq_id);
        if (empty($protfolioFaq)) {
            Flash::error('Protfolio Faq not found');
            return redirect(route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]));
        }

        return view('admin.protfolio_faqs.edit')->with('protfolioFaq', $protfolioFaq);
    }

    /**
     * Update the specified ProtfolioFaq in storage.
     *
     * @param int $id
     * @param UpdateProtfolioFaqRequest $request
     *
     * @return Response
     */
    public function update($protfolio_id, $proftfolio_faq_id, UpdateProtfolioFaqRequest $request)
    {
        $protfolioFaq = $this->protfolioFaqRepository->find($proftfolio_faq_id);

        if (empty($protfolioFaq)) {
            Flash::error('Protfolio Faq not found');

            return redirect(route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]));
        }

        $protfolioFaq = $this->protfolioFaqRepository->update($request->all(), $proftfolio_faq_id);

        Flash::success('Protfolio Faq updated successfully.');

        return redirect(route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]));
    }

    /**
     * Remove the specified ProtfolioFaq from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($protfolio_id, $proftfolio_faq_id)
    {
        $protfolioFaq = $this->protfolioFaqRepository->find($proftfolio_faq_id);

        if (empty($protfolioFaq)) {
            Flash::error('Protfolio Faq not found');

            return redirect(route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]));
        }

        $this->protfolioFaqRepository->delete($proftfolio_faq_id);

        Flash::success('Protfolio Faq deleted successfully.');

        return redirect(route('admin.protfolio.protfolioFaqs.index', ['protfolio_id' => request()->route('protfolio_id')]));
    }
}
