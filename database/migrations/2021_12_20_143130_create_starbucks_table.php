<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarbucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starbucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('original_drink', 50);
            $table->string('drink', 50);
            $table->string('memo',200);
            $table->integer('evaluation');
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
        Schema::dropIfExists('starbucks');
    }
}
