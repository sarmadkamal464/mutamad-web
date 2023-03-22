<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Policies\ClientPolicy;
use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    protected $response;

    public function __construct(ResponseController $response)
    {
        $this->response = $response;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'duration_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $documentName = null;
        if ($request->has('doc') && $request->doc != null) {
            $validator = Validator::make($request->all(), ['doc' => 'max:2048']);
            if ($validator->fails()) {
                return $this->response->validationErrorResponse($request, $validator);
            }
            $document = $request->file('doc');
            $documentName = time() . '.' . $document->getClientOriginalExtension();
            $document->storeAs('public/documents', $documentName);
        }
        $request['document'] = $documentName;
        $request['status'] = 'open';
        $request['client_id'] = Auth::user()->id;
        $project = new Project($request->except('_token', 'doc'));
        $project->save();
        return $this->response->collectionResponse($request, $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function inviteFreelancerToProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'freelancer_id' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $project = Project::find($request->project_id);
        if (!$project) {
            return $this->response->errorResponse($request, 'No Project Found', 403);
        }
        if ($project->client_id != Auth::user()->id) {
            return $this->response->errorResponse($request, 'You cannot invite anyone for this project', 403);
        }
        if ($project->status != 'open') {
            return $this->response->errorResponse($request, 'This project is not open to invite anyone', 403);
        }
        $freelancer = User::find($request->freelancer_id);
        if (!$freelancer->isFreelancer()) {
            return $this->response->errorResponse($request, 'Requested User is not a freelancer', 403);
        }
        $invitation = new Proposal([
            'project_id' => $request->project_id,
            'freelancer_id' => $request->freelancer_id,
            'description' => $request->description,
            'amount' => $request->amount ? $request->amount : null,
            'status' => 'pending',
            'status_change_by_user' => 'client',
            'status_change_by_user_id' => Auth::user()->id,
            'proposal_type' => 'invitation',
        ]);
        if ($invitation->save()) {
            return $this->response->collectionResponse($request, $invitation);
        }
        return $this->response->errorResponse($request, 'Something went wrongs', 403);
    }

    public function assignFreelancerToProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'freelancer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $project = Project::open()
            ->where('client_id', Auth::user()->id)
            ->find($request->project_id);
        if (!$project) {
            return $this->response->errorResponse($request, 'No Open Project Found for Details', 403);
        }
        $freelancer = User::find($request->freelancer_id);
        if (!$freelancer->isFreelancer()) {
            return $this->response->errorResponse($request, 'Requested User is not a freelancer', 403);
        }
        $proposal = Proposal::where('project_id', $request->project_id)
            ->where('freelancer_id', $request->freelancer_id)
            ->proposal()
            ->latest()
            ->first();
        if (!$proposal) {
            return $this->response->errorResponse($request, 'No proposal found for this project', 403);
        }
        $proposal->update([
            'status' => 'ongoing',
            'status_change_by_user' => 'client',
            'status_change_by_user_id' => Auth::user()->id,
        ]);
        $project->update([
            'status' => 'ongoing',
        ]);
        return $this->response->collectionResponse($request, $proposal);
    }

    public function markProjectAsDone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'freelancer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $project = Project::open()
            ->where('client_id', Auth::user()->id)
            ->find($request->project_id);
        if (!$project) {
            return $this->response->errorResponse($request, 'No Open Project Found for Details', 403);
        }
        $freelancer = User::find($request->freelancer_id);
        if (!$freelancer->isFreelancer()) {
            return $this->response->errorResponse($request, 'Requested User is not a freelancer', 403);
        }
        $proposal = Proposal::where('project_id', $request->project_id)
            ->where('freelancer_id', $request->freelancer_id)
            ->proposal()
            ->ongoing()
            ->latest()
            ->first();
        if (!$proposal) {
            return $this->response->errorResponse($request, 'No active freelancer record found for this project', 403);
        }
        $otherProposals = Proposal::where('project_id', $request->project_id)
            ->where('freelancer_id', '!=', $request->freelancer_id)
            ->update([
                'status' => 'cancelled',
                'status_change_by_user' => 'client',
                'status_change_by_user_id' => Auth::user()->id,
            ]);
        $proposal->update([
            'status' => 'completed',
            'status_change_by_user' => 'client',
            'status_change_by_user_id' => Auth::user()->id,
        ]);
        $project->update([
            'status' => 'completed',
        ]);
        return $this->response->collectionResponse($request, $proposal);
    }
}
