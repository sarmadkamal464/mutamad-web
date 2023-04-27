<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectDurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_duration', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });
        // Seeding rows in categories Table
        DB::table('project_duration')->insert([
            [
                'title' => 'less than 1 month',
                'slug' => 'less-than-1-month',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'less than 3 month',
                'slug' => 'less-than-3-month',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'more than 3 month',
                'slug' => 'more-than-3-month',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_duration');
    }
}
