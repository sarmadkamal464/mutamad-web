<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripeCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('stripe_customers', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email');
    $table->string('customer_id');
    $table->integer('user_id');
    $table->string('payment_method_id')->nullable();
    $table->string('status')->default('active');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stripe_customers');
    }
}
