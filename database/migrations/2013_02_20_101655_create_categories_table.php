<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->comment('Unique slug for url');
            $table->string('description');
            $table->timestamps();
        });
        // Seeding rows in categories Table
        DB::table('categories')->insert([
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Web development services including front-end, back-end, and full-stack development.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'description' => 'Mobile app development services for iOS, Android, and other platforms.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Graphic Design',
                'slug' => 'graphic-design',
                'description' => 'Design services for logos, brochures, websites, and other graphic design needs.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Writing',
                'slug' => 'writing',
                'description' => 'Writing services for articles, blog posts, copywriting, and other content needs.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Data Entry',
                'slug' => 'data-entry',
                'description' => 'Data entry services for entering and organizing data, including data cleaning and data analysis.',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
