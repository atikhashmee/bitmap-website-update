<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamTypeRequest;
use App\Http\Requests\UpdateTeamTypeRequest;
use App\Repositories\TeamTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TeamTypeController extends AppBaseController
{
    /** @var  TeamTypeRepository */
    private $teamTypeRepository;

    public function __construct(TeamTypeRepository $teamTypeRepo)
    {
        $this->teamTypeRepository = $teamTypeRepo;
    }

    /**
     * Display a listing of the TeamType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamTypes = $this->teamTypeRepository->all();

        return view('team_types.index')
            ->with('teamTypes', $teamTypes);
    }

    /**
     * Show the form for creating a new TeamType.
     *
     * @return Response
     */
    public function create()
    {
        return view('team_types.create');
    }

    /**
     * Store a newly created TeamType in storage.
     *
     * @param CreateTeamTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamTypeRequest $request)
    {
        $input = $request->all();

        $teamType = $this->teamTypeRepository->create($input);

        Flash::success('Team Type saved successfully.');

        return redirect(route('teamTypes.index'));
    }

    /**
     * Display the specified TeamType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teamType = $this->teamTypeRepository->find($id);

        if (empty($teamType)) {
            Flash::error('Team Type not found');

            return redirect(route('teamTypes.index'));
        }

        return view('team_types.show')->with('teamType', $teamType);
    }

    /**
     * Show the form for editing the specified TeamType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teamType = $this->teamTypeRepository->find($id);

        if (empty($teamType)) {
            Flash::error('Team Type not found');

            return redirect(route('teamTypes.index'));
        }

        return view('team_types.edit')->with('teamType', $teamType);
    }

    /**
     * Update the specified TeamType in storage.
     *
     * @param int $id
     * @param UpdateTeamTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamTypeRequest $request)
    {
        $teamType = $this->teamTypeRepository->find($id);

        if (empty($teamType)) {
            Flash::error('Team Type not found');

            return redirect(route('teamTypes.index'));
        }

        $teamType = $this->teamTypeRepository->update($request->all(), $id);

        Flash::success('Team Type updated successfully.');

        return redirect(route('teamTypes.index'));
    }

    /**
     * Remove the specified TeamType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teamType = $this->teamTypeRepository->find($id);

        if (empty($teamType)) {
            Flash::error('Team Type not found');

            return redirect(route('teamTypes.index'));
        }

        $this->teamTypeRepository->delete($id);

        Flash::success('Team Type deleted successfully.');

        return redirect(route('teamTypes.index'));
    }
}
