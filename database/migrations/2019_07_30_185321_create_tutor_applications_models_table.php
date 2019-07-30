<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorApplicationsModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_applications_models', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('qualification');
            $table->string('course');
            $table->string('paypalemail');
            $table->string('phone');
            $table->string('email');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutor_applications_models');
    }
}
