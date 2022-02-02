<?php

use Illuminate\Database\Seeder;
use App\Customs;

class CustomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customs')->insert([
            'id'     => 1,
            'custom'    => 'extra_whip',
        ]);
        DB::table('customs')->insert([
            'id'     => 2,
            'custom'    => 'light_whip',
        ]);
        DB::table('customs')->insert([
            'id'     => 3,
            'custom'    => 'no_whip',
        ]);
        DB::table('customs')->insert([
            'id'     => 4,
            'custom'    => 'extra_sourse',
        ]);
        DB::table('customs')->insert([
            'id'     => 5,
            'custom'    => 'light_sourse',
        ]);
        DB::table('customs')->insert([
            'id'     => 6,
            'custom'    => 'extra_syrup',
        ]);
        DB::table('customs')->insert([
            'id'     => 7,
            'custom'    => 'light_syrup',
        ]);
        
    }
}
