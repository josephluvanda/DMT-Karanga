<?php

use Illuminate\Database\Seeder;

class TopologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('regions')->insert([
        'name' => 'Mbeya',
        'position' => 'Mbeya',
        'description' => 'Mbeya Region'
      ]);

      DB::table('districts')->insert([
        'name' => 'Kyela',
        'region' => 1,
        'description' => 'Kyla District'
      ]);

      DB::table('wards')->insert([
        'name' => 'Karanga',
        'district' => 1,
        'description' => 'Karanga ward'
      ]);
    }
}
