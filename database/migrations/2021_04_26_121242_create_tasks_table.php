<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('start_date');
            $table->string('deadline');
            $table->string('working_hours');
            $table->string('title');
            
            $table->foreignId('administration_id');
            $table->foreignId('department_id');
            $table->foreignId('user_id');
            $table->foreignId('type_id');
            $table->foreignId('status_id');
            $table->foreignId('benefit_administration_id');
            $table->foreignId('benefit_user_id');

            $table->text('note');

            $table->foreign('administration_id')->references('id')->on('administrations')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('benefit_administration_id')->references('id')->on('administrations')->onDelete('cascade');
            $table->foreign('benefit_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
