<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipopersonas')->insert([
            'tipo' => 'Auto',
        ]);
        
        DB::table('tipopersonas')->insert([
            'tipo' => 'Camion',
        ]);
        DB::table('tipopersonas')->insert([
            'tipo' => 'Suv',
        ]);
    }
}
