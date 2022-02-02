<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('custom');
        });
        DB::table('customss')->insert([
        ['custom' => 'extra_whip'],
        ['custom' => 'light_whip'],
        ['custom' => 'no_whip'],
        ['custom' => 'extra_sourse'],
        ['custom' => 'light_sourse'],
        ['custom' => 'extra_syrup'],
        ['custom' => 'light_syrup'],
    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customs');
    }
}
