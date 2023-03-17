<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->comment('ID of the project for which the proposal is being made');
            $table->unsignedBigInteger('freelancer_id')->nullable();
            $table->foreign('freelancer_id')->references('id')->on('users')->where('role', 'freelancer')->comment('ID of the freelancer who is making the proposal');
            $table->text('description')->comment('Description of the proposal');
            $table->unsignedDecimal('amount', 10, 2)->comment('Amount (in dollars) being proposed for the project')->nullable();
            $table->enum('proposal_type', ['invitation', 'proposal'])->default('proposal')->comment('Type of the proposal');
            $table->enum('status', ['pending', 'ongoing', 'completed', 'cancelled'])->default('pending')->comment('Status of the proposal');
            $table->enum('status_change_by_user', ['freelancer', 'client'])->comment('Status of the proposal Change by weather freelancer or client');
            $table->unsignedBigInteger('status_change_by_user_id')->comment('User ID who accept(ongoing) or declined or left (cancelled) the project');
            $table->foreign('status_change_by_user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
