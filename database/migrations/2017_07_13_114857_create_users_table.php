<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();

            $table->string('pin_code')->nullable();

            // Stage info
            $table->string('stage_name');
            $table->boolean('stage_availability')->default(false);

            // Address info
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_zip')->nullable();
            $table->string('address_country')->nullable();

            $table->integer('nationality_id')->unsigned();
            $table->foreign('nationality_id')->references('id')->on('nationalities');

            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_relationship')->nullable();
            $table->string('emergency_contact_tel_no')->nullable();
            $table->string('emergency_contact_cell_no')->nullable();

            $table->boolean('is_working_visa')->default(false);
            $table->date('working_visa_expiry_date')->nullable();

            $table->boolean('is_convicted')->default(false);
            $table->text('convicted_details')->nullable();

            $table->string('profile_picture_path')->nullable();
            $table->string('profile_picture_url')->nullable();

            // Body details
            $table->decimal('height')->unsigned()->nullable();
            $table->decimal('weight')->unsigned()->nullable();

            $table->decimal('bust_size')->unsigned()->nullable();
            $table->decimal('waist_size')->unsigned()->nullable();

            $table->integer('eye_color_id')->unsigned()->nullable();
            $table->foreign('eye_color_id')->references('id')->on('eye_colors');

            $table->integer('hair_color_id')->unsigned()->nullable();
            $table->foreign('hair_color_id')->references('id')->on('hair_colors');

            $table->text('contract')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
