<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;
/*
Hybrid Application Authenticated Routes File which is available both in web and api php route file
|
*/

Route::post('deactivate-account', [UserController::class, 'deactivateAccount']);
Route::post('activate-account', [UserController::class, 'activateAccount']);
Route::get('/my-profile', [UserController::class, 'myProfile']);
Route::get('/get-user/{id}', [UserController::class, 'getUser']);
Route::get('ongoing-projects', [ProjectController::class, 'ongoingProject'])->name('ongoing-projects');
Route::get('completed-projects', [ProjectController::class, 'completedProject'])->name('completed-projects');
Route::get('get-projects', [ProjectController::class, 'getProjects']);
Route::post('/update-profile', [UserController::class, 'updateProfile']);
Route::get('get-projects-count', [ProjectController::class, 'getProjectsCount']);
Route::get('get-all-jobs', [ProjectController::class, 'getAllJobs']);

// Route::resources([
//     'project' => ProjectController::class,
// ]);
//Route for client
Route::middleware('auth.client')->group(function () {
    Route::get('project/{id}', [ProjectController::class, 'getProjectDetails']);
    Route::get('search-freelancer', [ClientController::class, 'searchFreelancer']);
    Route::resources([
        'clientProject' => ClientController::class,
    ]);
    Route::get('/post-project', [HomeController::class, 'postProject']);
    Route::get('get-project-proposals', [ProjectController::class, 'projectWithProposal'])->name('get-project-proposals');
    Route::get('open-projects', [ProjectController::class, 'openProject'])->name('open-projects');
    Route::get('/get-project-proposals/{id}', [ProjectController::class, 'getProjectProposals']);
    Route::get('/get-project-proposals-freelancer/{id}', [ProjectController::class, 'getProjectProposalsFreelancers']);
    Route::post('/invite-freelancer-to-project', [ClientController::class, 'inviteFreelancerToProject']);
    Route::get('/invite-freelancer-to-project', [HomeController::class, 'inviteFreelancer']);
    Route::post('/assign-freelancer-to-project', [ClientController::class, 'assignFreelancerToProject']);
    Route::post('/mark-project-as-done', [ClientController::class, 'markProjectAsDone']);
    Route::post('/client-stripe',[StripePaymentController::class,'createCustomer']);
    Route::post('/freelancer-account', [StripePaymentController::class, 'addFreelancerAccount']);
    Route::get('client-spending', [ProjectController::class, 'clientSpending']); Route::post('/freelancer-account', [StripePaymentController::class, 'addFreelancerAccount']);

});

//Route for Freelancers
Route::middleware('auth.freelancer')->group(function () {
    Route::resources([
        'freelancerProject' => FreelancerController::class,
    ]);
    Route::post('sendProposal', [FreelancerController::class, 'sendProposal']);
    Route::get('search-project', [FreelancerController::class, 'searchProject']);
    Route::get('fe-open-projects', [ProjectController::class, 'openProject'])->name('open-projects');
    Route::get('fe-ongoing-projects', [ProjectController::class, 'ongoingProject'])->name('ongoing-projects');
    Route::get('single-project/{id}', [ProjectController::class, 'getProjectDetails']);
    Route::get('single-project2/{id}', [ProjectController::class, 'getProjectDetails']);
    Route::get('single-project3/{id}', [ProjectController::class, 'getProjectDetails']);
    Route::get('fe-completed-projects', [ProjectController::class, 'completedProject'])->name('completed-projects');
    Route::get('invitation-projects', [ProjectController::class, 'getClientProjectInvitation']);
 
    Route::get('pending-projects', [ProjectController::class, 'pendingProject']);
    Route::post('/fe-assign-freelancer-to-project', [ClientController::class, 'assignFreelancerToProject']);
    Route::get('freelancer-spending', [ProjectController::class, 'freelancerSpending']);
});
