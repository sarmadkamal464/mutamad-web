<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Project;
use App\Models\ProjectDuration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $project;
    protected $user;
    function __construct(ProjectController $project, UserController $user)
    {
        $this->project = $project;
        $this->user = $user;
    }
    public function index()
    {
        return view('site.home', ['categories' => Category::all()]);
    }

    public function about()
    {
        return view('site.about');
    }
    public function paymentStripe()
    {
        return view('site.paymentStripe');
    }

    public function freelancer(Request $request, $slug)
    {
        $freelancer = User::active()
            ->where('username', $slug)
            ->first();
        return view('site.client.freelancerDetails', ['freelancer' => $freelancer]);
    }
    public function ongoingProject()
    {
        return view('site.ongoingProject');
    }
    public function completedProject()
    {
        return view('site.completedProject');
    }
    public function assignedProject()
    {
        return view('site.assignedProject ');
    }
    public function postProject()
    {
        return view('site.client.project.postProject', ['categories' => Category::all(), 'durations' => ProjectDuration::all()]);
    }

    public function privacyPolicy()
    {
        return view('site.privacyPolicy');
    }

    public function howsItWork()
    {
        return view('site.howsItWork');
    }

    public function login()
    {
        return view('site.auth.login');
    }

    public function signup(Request $request)
    {
        $name = $request->query('name');
        $email = $request->query('email');
        return view('site.auth.signup', ['categories' => Category::all(), 'countries' => Country::all(), 'name' => $name, 'email' => $email]);
    }

    public function forgetPassword()
    {
        return view('site.auth.forgetPassword');
    }

    public function userProfile(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('site.shared.myProfile', ['user' => $user, 'countries' => Country::all()]);
    }

    public function assignFreelancer(Request $request, $id)
    {
        $request['noRedirect'] = true; // to block redirecting
        $projectProposalsFreelancer = $this->project->getProjectProposals($request, $id);
        return view('site.client.project.assignedProject', ['projectProposalsFreelancer' => $projectProposalsFreelancer]);
    }
    public function messages()
    
    {$user = User::findOrFail(Auth::user()->id);
        return view('site.chat', ['user' => $user]);
       
    }
}
