<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            'id' => 1,
            'tipo' => 'CURP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_documentos')->insert([
            'id' => 2,
            'tipo' => 'NSS',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_documentos')->insert([
            'id' => 3,
            'tipo' => 'CERTIFICADO MEDICO',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tipo_documentos')->insert([
            'id' => 4,
            'tipo' => 'CUENTA CLABE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_documentos')->insert([
            'id' => 5,
            'tipo' => 'INE',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_documentos')->insert([
            'id' => 6,
            'tipo' => 'RFC',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
