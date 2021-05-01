<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->integer('id_number')->unique();
            $table->string('job');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('working_at');
            $table->bigInteger('section_id');

            // $table->foreignId('administration_id');
            // $table->foreignId('department_id');
            // $table->foreignId('publicadministration_id');
            // $table->foreignId('branch_id');


            // $table->foreign('administration_id')->references('id')->on('administrations')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('publicadministration_id')->references('id')->on('publicadministrations')->onDelete('cascade');
            // $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
