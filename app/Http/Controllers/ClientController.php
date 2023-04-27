<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use App\Policies\ClientPolicy;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\Review;
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
        return $this->response->successResponse($request, 'Project Posted Successfully', true, 'open-projects');
    }

    public function searchFreelancer(Request $request)
    {
        $freelancer = User::active()
            ->with('category')
            ->freelancer()
            ->filter($request->all())
            ->get();
        $data['freelancers'] = $freelancer;
        $data['countries'] = Country::all();
        $data['categories'] = Category::all();
        return $this->response->collectionResponse($request, $freelancer, true, 'site/client/search-freelancer', $data);
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
        $project = Project::open()->find($request->project_id);
        if (!$project) {
            return $this->response->errorResponse($request, 'No Open Project Found', 403);
        }
        if ($project->client_id != Auth::user()->id) {
            return $this->response->errorResponse($request, 'You cannot invite anyone for this project', 403);
        }
        $freelancer = User::find($request->freelancer_id);
        if (!$freelancer->isFreelancer()) {
            return $this->response->errorResponse($request, 'Requested User is not a freelancer', 403);
        }

        $proposal = Proposal::where('freelancer_id', $request->freelancer_id)
            ->where('project_id', $request->project_id)
            ->first();
        if ($proposal) {
            return $this->response->errorResponse($request, "You already send offer to $freelancer->name for this project ", 403);
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
            $message = "Offer send to $freelancer->name successfully";
            return $this->response->successResponse($request, $message, true, 'open-projects');
        }
        return $this->response->errorResponse($request, 'Something went wrongs', 403);
    }

    public function assignFreelancerToProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'proposal_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $project = Project::open()
            ->where('client_id', Auth::user()->id)
            ->find($request->project_id);
        if (!$project) {
            return $this->response->errorResponse($request, 'This project is not open to assigned', 403);
        }
        $proposal = Proposal::where('project_id', $request->project_id)->find($request->proposal_id);
        if (!$proposal) {
            return $this->response->errorResponse($request, 'No proposal found for this project', 403);
        }
        $freelancer = User::find($proposal->freelancer_id);
        $proposal->update([
            'status' => 'ongoing',
            'status_change_by_user' => 'client',
            'status_change_by_user_id' => Auth::user()->id,
        ]);
        $project->update([
            'status' => 'ongoing',
        ]);
        $message = "Project Assigned to $freelancer->name successfully";
        return $this->response->successResponse($request, $message, true, 'ongoing-projects');
    }

    public function markProjectAsDone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'proposal_id' => 'required',
            'comment' => 'required',
            'rating' => 'required|numeric|between:0,5.0',
        ]);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $project = Project::ongoing()
            ->where('client_id', Auth::user()->id)
            ->find($request->project_id);
        if (!$project) {
            return $this->response->errorResponse($request, 'No Ongoing Project Found for Details', 403);
        }
        $proposal = Proposal::where('project_id', $request->project_id)
            ->ongoing()
            ->find($request->proposal_id);

        if (!$proposal) {
            return $this->response->errorResponse($request, 'No active freelancer ongoing project  record found for this project', 403);
        }
        $freelancer = User::find($proposal->freelancer_id);
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
        $review = new Review([
            'freelancer_id' => $freelancer->id,
            'client_id' => Auth::user()->id,
            'project_id' => $request->project_id,
            'for' => 'freelancer',
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        $review->save();
        $message = 'Project marked as completed successfully';
        return $this->response->successResponse($request, $message, true, 'completed-projects');
    }
}
