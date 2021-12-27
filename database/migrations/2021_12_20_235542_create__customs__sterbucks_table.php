<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomsSterbucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs_starbucks', function (Blueprint $table)
        {
            $table->integer('starbucks_id')->unsigned();
            $table->integer('customs_id')->unsigned();    
            $table->primary(['starbucks_id', 'customs_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_customs__sterbucks');
    }
}
