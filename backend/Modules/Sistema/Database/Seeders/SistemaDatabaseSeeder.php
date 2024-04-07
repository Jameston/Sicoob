<?php

namespace Modules\Sistema\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Pessoa\Entities\PessoaTipo as EntitiesPessoaTipo;

class SistemaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Inserindo cidades');

        $path = public_path() . '/sql/cidades.sql';
        DB::unprepared(file_get_contents($path));
        DB::update("update cidade set created_at = '2020-09-08 11:10:01', updated_at = '2020-09-08 11:10:01'");

        $this->command->info('Cidades inseridas!');

        EntitiesPessoaTipo::insert([
            [
                'descricao' => 'Cliente',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ], 
            [
                'descricao' => 'Fornecedor',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
