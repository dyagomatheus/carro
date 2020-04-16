<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('social_name')->nullable();
            $table->string('fantasy_name')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('code')->nullable();
            $table->string('telephone')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->integer('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('responsible')->nullable();
            $table->string('state_registration')->nullable();
            $table->integer('status')->nullable()->default(false);
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
        Schema::dropIfExists('clients');
    }
}
