<?php

use App\DDD\Domain\Color\ColorHex;
use App\DDD\Domain\Color\ColorName;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", ColorName::MAX_LENGTH);
            $table->char("hex", ColorHex::LENGTH);
            $table->timestamps();
            $table->unique(["name"]);
            $table->unique(["hex"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colors');
    }
}
