<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $units = [
        [ 'id' => 'ea', 'description' => 'Each'],
        [ 'id' => 'pc', 'description' => 'Piece'],
        [ 'id' => 'set', 'description' => 'Set']
      ];

      foreach($units as $unit)
      {
        App\Unit::create($unit);
      }

    }
}
