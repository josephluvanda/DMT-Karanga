<?php

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\District;
use App\Models\Ward;

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
        'description' => 'Mbeya region'
      ]);
      DB::table('districts')->insert([
        'name' => 'Kyela',
        'region' => 1,
        'description' => 'Kyela district'
      ]);
      DB::table('wards')->insert([
        'name' => 'Karanga',
        'district' => 1,
        'description' => 'Karanga ward'
      ]);
    }
}
