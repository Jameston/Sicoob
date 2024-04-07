<?php

namespace Modules\Empresa\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Empresa\Entities\Empresa;
use Modules\Usuario\Entities\Usuario;
use Modules\Usuario\Entities\UsuarioEmpresa;

class EmpresaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Empresa::insert(
            [
                'id_empresa' => 1,
                'nome' => 'Jameston',
                'cnpj_cpf' => '00000000000000',
                'ie_rg' => '123.456.789',
                'cep' => '89700000',
                'logradouro' => 'Centro',
                'numero' => '80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id_empresa' => 2,
                'nome' => 'Sicoob Crediauc',
                'cnpj_cpf' => '00000000000000',
                'ie_rg' => '123.456.789',
                'cep' => '89700000',
                'logradouro' => 'Centro',
                'numero' => '80',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        );

        $usuario = Usuario::create([
            'usuario' => 'jameston@gmail.com',
            'password' => bcrypt(123),
            'remember_token' => true,
            'nome' => 'Jameston',
        ]);

        UsuarioEmpresa::create([
            'id_usuario' => $usuario->id_usuario,
            'id_empresa' => 1,
        ]);
    }
}
