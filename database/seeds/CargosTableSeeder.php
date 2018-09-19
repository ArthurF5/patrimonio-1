<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$cargos = [
    		'Administrador',
    		'Analista de Tecnologia da Informação',
    		'Assistente de Aluno',
    		'Bibliotecário',
    		'Contador',
    		'Técnico em Contabilidade',
    		'Técnico em Tecnologia da Informação',
    		'Assistente de Laboratório - Informática',
    		'Técnico de Laboratório - Informática',
    		'Auxiliar em Administração',
    		'Auxiliar de Biblioteca',
    		'Técnico em Secretariado',
    		'Assistente em Administração',
    	];

        foreach ($cargos as $cargo) {
        	App\Models\Cargo::create([
        		'nome' => $cargo,
        	]);
        }
    }
}
