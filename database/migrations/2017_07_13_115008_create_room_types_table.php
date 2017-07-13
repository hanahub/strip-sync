<?php

use App\Enums\RoomTypeEnum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->decimal('dance_duration')->unsigned();
            $table->decimal('price_per_dance')->unsigned();

            $table->enum('fee_type', RoomTypeEnum::getConstants());
            $table->decimal('house_fee')->unsigned();

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
        Schema::dropIfExists('room_types');
    }
}
