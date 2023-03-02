<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('The user ID');
            $table->string('name')->comment('The user\'s full name');
            $table->string('email')->unique()->comment('The user\'s email address');
            $table->string('username')->unique()->comment('The user\'s username');
            $table->string('password')->comment('The user\'s hashed password');
            $table->string('profile_image')->nullable()->comment('The user\'s profile image file name');
            $table->string('phone')->nullable()->comment('The user\'s phone number');
            $table->string('country')->nullable()->comment('The user\'s country');
            $table->text('bio')->nullable()->comment('The user\'s bio or description');
            $table->string('experience')->nullable()->comment('The user\'s experience');
            $table->enum('role', ['client', 'freelancer', 'other'])->comment('The user\'s role (either client or freelancer)');
            $table->unsignedBigInteger('category_id')->comment('The ID of the category that the user belongs to');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('wallet')->nullable()->comment('Customer Id for User provided by stripe');
            $table->decimal('wallet_balance', 10, 2)->default(0)->comment('The user\'s current balance in their wallet');
            $table->boolean('agreed_terms_of_conditions')->default(0)->comment('Whether the user has agreed to the terms and conditions of the platform');
            $table->boolean('is_active')->default(1)->comment('Whether the user is active or deactive');
            $table->string('deactivate-reason')->nullable()->comment('Reason why user deactivate his/her account');
            $table->boolean('is_admin')->default(0)->comment('Whether the user is admin or not');
            $table->rememberToken()->comment('The user\'s "remember me" token');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
