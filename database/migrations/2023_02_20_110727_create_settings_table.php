<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('The name of the app setting');
            $table->string('slug')->unique()->comment('The unique slug of the app setting for reference');
            $table->text('value')->comment('The value of the app setting');
            $table->timestamps();
        });

        // Seeding rows in Setting Table
        DB::table('settings')->insert([
            [
                'name' => 'App Name',
                'slug' => 'app_name',
                'value' => 'Mutahmad',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
