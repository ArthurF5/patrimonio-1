<?php

use Illuminate\Database\Seeder;

class SetoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setores = [
    		'DG',
    		'GABINETE',
    		'DEPEN',
    		'DEPAD',
    		'CHEFIA DEPAD',
    		'COGEP',
    		'PROTOCOLO',
    		'ALMOXARIFADO',
    		'COORDENAÇÃO DE CURSOS',
    		'CGTI',
    		'CORES',
    		'NIAP',
    		'BIBLIOTECA',
    		'SALA DOS PROFESSORES',
    		'CONTABILIDADE',
    		'PI',
    	];

        foreach ($setores as $setor) {
        	App\Models\Setor::create([
        		'nome' => $setor,
        	]);
        }
    }
}
