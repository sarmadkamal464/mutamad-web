<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\User;
use App\Policies\FreelancerPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FreelancerController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchFreelancer(Request $request)
    {
        return $this->response->collectionResponse(
            $request,
            User::active()
                ->freelancer()
                ->filter($request->all())
                ->get(),
            true,
            'freelancers',
        );
    }

    public function sendProposal(Request $request)
    {
        $validator = Validator::make($request->all(), ['project_id' => 'required', 'description' => 'required']);
        if ($validator->fails()) {
            return $this->response->validationErrorResponse($request, $validator);
        }
        $project = Project::find($request->project_id);
        $proposal = new Proposal([
            'project_id' => $request->project_id,
            'freelancer_id' => Auth::user()->id,
            'description' => $request->description,
            'amount' => $project->amount,
            'proposal_type' => 'proposal',
            'status' => 'pending',
            'status_change_by_user' => 'freelancer',
            'status_change_by_user_id' => Auth::user()->id,
        ]);
        $proposal->save();
        return $this->response->successResponse($request, 'Proposal is submitted successfull');
    }
}
