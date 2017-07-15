<?php

use App\Enums\OperatingHoursType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');

            // Common info
            $table->string('legal_business_name');
            $table->string('president_name');
            $table->string('legal_business_address');
            $table->string('physical_venue_address');

            $table->enum('operating_hours_type', OperatingHoursType::getConstants());

            $table->time('operating_hours_open')->nullable();
            $table->time('operating_hours_close')->nullable();

            // Default settings
            $table->decimal('house_fee')->unsigned();
            $table->decimal('stage_fee')->unsigned();
            $table->decimal('standard_cover_cost')->unsigned();
            $table->integer('simultaneous_performers')->unsigned();
            $table->decimal('default_song_duration')->unsigned();
            $table->decimal('default_dance_price')->unsigned();

            // Working Environment
            $table->integer('entertainers_count')->unsigned();
            $table->integer('bartenders_count')->unsigned();
            $table->integer('shot_girls_count')->unsigned();
            $table->integer('waitress_count')->unsigned();
            $table->integer('bottle_servers_count')->unsigned();
            $table->integer('djs_count')->unsigned();
            $table->integer('security_count')->unsigned();
            $table->integer('promoters_count')->unsigned();

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
        Schema::dropIfExists('venues');
    }
}
