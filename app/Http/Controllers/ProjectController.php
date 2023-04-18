<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectDuration;
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
            ->with('category')
            ->with('duration')
            ->freelancers()
            ->filter($request->only('limit', 'offset', 'status'))
            ->get()
            : ($request->status == null 
                ? Proposal::where('freelancer_id', $user->id)
                ->with('project')
                ->skip((int)$request->offset)
                ->take((int)$request->limit)
                ->get()
                : Proposal::where('status', $request->status)
                ->where('freelancer_id', $user->id)
                ->with('project')
                ->skip((int)$request->offset)
                ->take((int)$request->limit)
                ->get());
        return $this->response->collectionResponse($request, $data);
    }

    public function getProjectDetails(Request $request, $id)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
        ? Project::where('client_id', Auth::user()->id)
            ->with('category')
            ->with('duration')
            ->freelancers()
           
            ->find($id)
            : Project::with('category')
            ->with('duration')
            ->with('clients')
            ->find($id);
        
        if (!$data)
            $data = [];
         
        return $this->response->collectionResponse($request, $data, true, 'site/client/project/projectDetail', $data);
    }

    public function getProjectsCount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = [];
        if (!$user->isFreelancer()) {
            $data['open'] = Project::where('client_id', $user->id)
                ->open()
                ->count();
            $data['completed'] = Project::where('client_id', $user->id)
                ->completed()
                ->count();
            $data['ongoing'] = Project::where('client_id', $user->id)
                ->ongoing()
                ->count();
        } else {
            $data['ongoing'] = Proposal::where('freelancer_id', $user->id)
                ->ongoing()
                ->count();
            $data['completed'] = Proposal::where('freelancer_id', $user->id)
                ->completed()
                ->count();
            $data['requested'] = Proposal::where('freelancer_id', $user->id)
                ->requested()
                ->count();
        }
        return $this->response->collectionResponse($request, $data);
    }

    public function ongoingProject(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
            ? Project::where('client_id', $user->id)
            ->with('category')
            ->with('duration')
            ->ongoing()
            ->hiredFreelancer()
            ->get()
            : Proposal::with('project')
            ->where('freelancer_id', $user->id)
            ->ongoing()
            ->get();
        $compact['data'] = $data;
        $request['noRedirect'] = true;
        $compact['projectCounts'] = $this->getProjectsCount($request);
        $viewPage = (!$user->isFreelancer()) ? 'site/client/project/ongoingProject' : 'site/freelancer/ongoingProject';
        return $this->response->collectionResponse($request, $data, true, $viewPage, $compact);
    }

    public function openProject(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
            ? Project::where('client_id', $user->id)
            ->with('category')
            ->with('duration')
            ->open()
            ->get()
            : Proposal::with('projects')
            ->where('freelancer_id', $user->id)
            ->open()
            ->get();
        $compact['data'] = $data;
        $request['noRedirect'] = true;
        $compact['projectCounts'] = $this->getProjectsCount($request);
        $viewPage = (!$user->isFreelancer()) ? 'site/client/project/openProject' : 'site/freelancer/openProject';
        return $this->response->collectionResponse($request, $data, true, $viewPage, $compact);
    }

    public function completedProject(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = !$user->isFreelancer()
            ? Project::where('client_id', $user->id)
            ->with('category')
            ->with('duration')
            ->completed()
            ->jobDoneByFreelancer()
            ->get()
            : Proposal::with('project') //projects
            ->where('freelancer_id', $user->id)
            ->completed()
            ->get();
        $compact['data'] = $data;
        $request['noRedirect'] = true;
        $compact['projectCounts'] = $this->getProjectsCount($request);
        $viewPage = (!$user->isFreelancer()) ? 'site/client/project/completedProject' : 'site/freelancer/completedProject';
        return $this->response->collectionResponse($request, $data, true,  $viewPage, $compact);
    }

    public function getProjectProposals(Request $request, $id)
    {
        $request['noRedirect'] = true;
        $project = Project::where('client_id', Auth::user()->id)
            ->with('category')
            ->with('duration')
            ->freelancers()
            ->find($id);
        return $this->response->collectionResponse($request, $project, true, "site.client.project.assignedProject", $project);
    }
    public function getProjectDuration(Request $request)
    {
        return $this->response->collectionResponse($request, ProjectDuration::all());
    }

    public function getAllJobs(Request $request)
    {
        $data = Project::where('status', 'open')
        ->with('category')
        ->with('duration')
        ->with('clients')
        ->filter($request->all())
        ->get();
        return $this->response->collectionResponse($request, $data);
    }

    public function getClientProjectInvitation(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $data = Proposal::with('project')
            ->where('freelancer_id', $user->id)
            ->where('proposal_type', 'invitation')
            ->get();
        return $this->response->collectionResponse($request, $data);
    }
}
