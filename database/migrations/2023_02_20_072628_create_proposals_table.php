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
            $table->unsignedBigInteger('freelancer_id');
            $table->foreign('freelancer_id')->references('id')->on('users')->where('role', 'freelancer')->comment('ID of the freelancer who is making the proposal');
            $table->text('description')->comment('Description of the proposal');
            $table->unsignedDecimal('amount', 10, 2)->comment('Amount (in dollars) being proposed for the project');
            $table->enum('status', ['pending', 'ongoing', 'completed', 'cancelled'])->default('pending')->comment('Status of the proposal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
