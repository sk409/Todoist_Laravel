<?php

use App\DDD\Domain\Priority\PriorityName;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priority', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", PriorityName::MAX_LENGTH);
            $table->char("hex", 6);
            $table->timestamps();
            $table->unique("name");
            $table->unique("hex");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priority');
    }
}
