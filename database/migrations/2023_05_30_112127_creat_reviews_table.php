<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelancer_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('project_id');
            $table->enum('for', ['client', 'freelancer'])->default('client')->comment('Indicates whether the review is for the client or freelancer');
            $table->integer('rating')->nullable()->comment('The rating given by the client or freelancer');
            $table->text('comment')->nullable()->comment('Any comments the client or freelancer has about the freelancer or client');
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('freelancer_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
