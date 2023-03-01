<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->comment('User ID for Client');
            $table->foreign('client_id')->references('id')->on('users');
            $table->unsignedBigInteger('freelancer_id')->comment('User ID for Freelancer');
            $table->foreign('freelancer_id')->references('id')->on('users');
            $table->unsignedBigInteger('project_id')->comment('Specific Project ID');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'completed', 'refunded', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
