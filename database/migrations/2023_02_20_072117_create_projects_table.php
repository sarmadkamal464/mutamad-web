<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id()->comment('Unique identifier for the project');
            $table->unsignedBigInteger('client_id')->comment('Client who created the project');
            $table->foreign('client_id')->references('id')->on('users');
            $table->unsignedBigInteger('category_id')->nullable()->comment('Category belongs to this created the project');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('title')->comment('Title of the project');
            $table->text('description')->comment('Description of the project');
            $table->unsignedDecimal('budget', 10, 2)->comment('Budget allocated for the project');
            $table->unsignedBigInteger('duration_id')->comment('Project Duration based on project Durtation Table');
            $table->foreign('duration_id')->references('id')->on('project_duration');
            $table->enum('status', ['open', 'ongoing', 'completed', 'cancelled'])->default('open')->comment('Status of the project');
            $table->string('document')->nullable()->comment('Document uploaded within the project');
            $table->timestamp('due_date')->nullable()->comment('Due date of the project');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
