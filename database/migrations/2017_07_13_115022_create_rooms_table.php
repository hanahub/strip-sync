<?php

use App\Enums\RoomTypeEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->integer('room_type_id')->unsigned();
            $table->foreign('room_type_id')->references('id')->on('room_types');

            $table->boolean('inherit_pricing');

            $table->decimal('dance_duration')->unsigned()->nullable();
            $table->decimal('price_per_dance')->unsigned()->nullable();

            $table->enum('fee_type', RoomTypeEnum::getConstants())->nullable();
            $table->decimal('house_fee')->unsigned()->nullable();

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
        Schema::dropIfExists('rooms');
    }
}
