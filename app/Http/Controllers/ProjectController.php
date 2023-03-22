<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    protected $response;

    function __construct(ResponseController $response)
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function getProjects(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
            ? Project::where('client_id', $user->id)
            ->where('client_id', $user->id)
            ->filter($request->only('limit', 'offset'))
            ->get()
            : Proposal::with('projects')
            ->where('freelancer_id', $user->id)
            ->filter($request->only('limit', 'offset'))
            ->get();
        return $this->response->collectionResponse($request, $data);
    }

    public function ongoingProject(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
            ? Project::where('client_id', $user->id)
            ->ongoing()
            ->get()
            : Proposal::with('projects')
            ->where('freelancer_id', $user->id)
            ->ongoing()
            ->get();
        return $this->response->collectionResponse($request, $data);
    }

    public function completedProject(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
            ? Project::where('client_id', $user->id)
            ->completed()
            ->get()
            : Proposal::with('projects')
            ->where('freelancer_id', $user->id)
            ->completed()
            ->get();
        return $this->response->collectionResponse($request, $data);
    }

    public function getProjectProposals(Request $request, $id)
    {
        $project = Project::where('client_id', Auth::user()->id)
            ->with('proposals')
            ->find($id);
        return $this->response->collectionResponse($request, $project->proposals);
    }

    public function getProjectProposalsFreelancers(Request $request, $id)
    {
        return $this->response->collectionResponse(
            $request,
            User::with('proposals')
                ->whereHas('proposals', function ($query) use ($id) {
                    $query->where('project_id', $id)->proposal();
                })
                ->get(),
        );
    }
}
