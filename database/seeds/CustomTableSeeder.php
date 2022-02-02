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
        $custom = Customs::create([
            'id'     => 1,
            'custom'    => 'extra_whip',
        ]);
        $custom = Customs::create([
            'id'     => 2,
            'custom'    => 'light_whip',
        ]);
        $custom = Customs::create([
            'id'     => 3,
            'custom'    => 'no_whip',
        ]);
        $custom = Customs::create([
            'id'     => 4,
            'custom'    => 'extra_sourse',
        ]);
        $custom = Customs::create([
            'id'     => 5,
            'custom'    => 'light_sourse',
        ]);
        $custom = Customs::create([
            'id'     => 6,
            'custom'    => 'extra_syrup',
        ]);
        $custom = Customs::create([
            'id'     => 7,
            'custom'    => 'light_syrup',
        ]);
    }
}
