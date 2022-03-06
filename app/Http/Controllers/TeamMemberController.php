<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\TeamMemberRepository;
use App\Http\Controllers\AppBaseController;
use Sudip\MediaUploder\Facades\MediaUploader;
use App\Http\Requests\CreateTeamMemberRequest;
use App\Http\Requests\UpdateTeamMemberRequest;

class TeamMemberController extends AppBaseController
{
    /** @var  TeamMemberRepository */
    private $teamMemberRepository;

    public function __construct(TeamMemberRepository $teamMemberRepo)
    {
        $this->teamMemberRepository = $teamMemberRepo;
    }

    /**
     * Display a listing of the TeamMember.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamMembers = $this->teamMemberRepository->all();

        return view('admin.team_members.index')
            ->with('teamMembers', $teamMembers);
    }

    /**
     * Show the form for creating a new TeamMember.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.team_members.create');
    }

    /**
     * Store a newly created TeamMember in storage.
     *
     * @param CreateTeamMemberRequest $request
     *
     * @return Response
     */
    public function store(CreateTeamMemberRequest $request)
    {
        $input = $request->all();
        $teamMember = $this->teamMemberRepository->create($input);
        if ($request->hasFile('image')) {
            $file = MediaUploader::imageUpload($request->image, 'team_members', 0);
            if ($file) {
                $teamMember->fill(['image' => $file['name']]);
            }
        }
        $teamMember->save();
        Flash::success('Team Member saved successfully.');

        return redirect(route('admin.teamMembers.index'));
    }

    /**
     * Display the specified TeamMember.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $teamMember = $this->teamMemberRepository->find($id);

        if (empty($teamMember)) {
            Flash::error('Team Member not found');

            return redirect(route('admin.teamMembers.index'));
        }

        return view('admin.team_members.show')->with('teamMember', $teamMember);
    }

    /**
     * Show the form for editing the specified TeamMember.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $teamMember = $this->teamMemberRepository->find($id);

        if (empty($teamMember)) {
            Flash::error('Team Member not found');

            return redirect(route('admin.teamMembers.index'));
        }

        return view('admin.team_members.edit')->with('teamMember', $teamMember);
    }

    /**
     * Update the specified TeamMember in storage.
     *
     * @param int $id
     * @param UpdateTeamMemberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTeamMemberRequest $request)
    {
        $teamMember = $this->teamMemberRepository->find($id);
        $input = $request->all();
        if (empty($teamMember)) {
            Flash::error('Team Member not found');
            return redirect(route('admin.teamMembers.index'));
        }

        if ($request->hasFile('image')) {
            MediaUploader::delete('team_members', $teamMember->image);
            $file = MediaUploader::imageUpload($request->image, 'team_members', 0);
            if ($file) {
                $input['image'] = $file['name'];
            }
        }

        $teamMember = $this->teamMemberRepository->update($input, $id);

        Flash::success('Team Member updated successfully.');

        return redirect(route('admin.teamMembers.index'));
    }

    /**
     * Remove the specified TeamMember from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $teamMember = $this->teamMemberRepository->find($id);
        if (empty($teamMember)) {
            Flash::error('Team Member not found');
            return redirect(route('admin.teamMembers.index'));
        }

        MediaUploader::delete('team_members', $teamMember->image);
        $this->teamMemberRepository->delete($id);
        Flash::success('Team Member deleted successfully.');
        return redirect(route('admin.teamMembers.index'));
    }
}
