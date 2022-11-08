<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::factory()->has(Reservation::factory()->count(5))
            ->count(20)->create();
    }
}
