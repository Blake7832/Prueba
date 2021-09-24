<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
        [
           'nameRol'=>'SuperAdmin',
           'activo'=>true
        ],
        [
            'nameRol'=>'Admin',
            'activo'=>true
        ],
        [
            'nameRol'=>'Docente',
            'activo'=>true  
        ]
        ]);
    }
}
