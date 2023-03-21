<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
Hybrid Application Authenticated Routes File which is available both in web and api php route file
|
*/

Route::post('deactivate-account', [UserController::class, 'deactivateAccount']);
Route::get('/my-profile', [UserController::class, 'myProfile']);
Route::get('/get-user/{id}', [UserController::class, 'getUser']);
Route::get('ongoing-projects', [ProjectController::class, 'ongoingProject']);
Route::get('completed-projects', [ProjectController::class, 'completedProject']);
Route::get('get-projects', [ProjectController::class, 'getProjects']);
Route::resources([
    'project' => ProjectController::class,
]);
//Route for client
Route::middleware('auth.client')->group(function () {
    Route::get('search-freelancer', [FreelancerController::class, 'searchFreelancer']);
    Route::resources([
        'clientProject' => ClientController::class,
    ]);
    Route::post('/update-client-profile', [ClientController::class, 'updateProfile']);
    Route::get('/get-project-proposals/{id}', [ProjectController::class, 'getProjectProposals']);
    Route::get('/get-project-proposals-freelancer/{id}', [ProjectController::class, 'getProjectProposalsFreelancers']);
    Route::post('/invite-freelancer-to-project', [ClientController::class, 'inviteFreelancerToProject']);
    Route::post('/assign-freelancer-to-project', [ClientController::class, 'assignFreelancerToProject']);
    Route::post('/mark-project-as-done', [ClientController::class, 'markProjectAsDone']);
});

//Route for Freelancers
Route::middleware('auth.freelancer')->group(function () {
    Route::resources([
        'freelancerProject' => FreelancerController::class,
    ]);
});
