<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('company_name');
            $table->string('legal_status');
            $table->string('capital');
            $table->string('siret');
            $table->string('code_naf');
            $table->string('country');
            $table->string('address');
            $table->string('zip_code');
            $table->string('city');
            $table->string('projects');
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
