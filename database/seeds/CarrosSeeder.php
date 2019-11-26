<?php

use Illuminate\Database\Seeder;
use App\Carro;
class CarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $onix = Carro::create([
        	'nome'       =>'Onix',
        	'fabricacao' =>'2019-01-01',
        	'preco'      =>'65.000,00',
        	'resumo'     =>'O Onix Sedan substituirá o Prisma em parte, pois a GM continuará vendendo o sedã de entrada na versão Joy. Ele será mais caro que o atual e vai ficar maior para preencher a lacuna entre o Prisma e o Cruze, perfeito para brigar com o Volkswagen Virtus. Custará entre R$ 65 mil e R$ 70 mil.'
        ]);
        $onix->inserirMarca('chevrolet');

        $hb20 = Carro::create([
        	'nome'       =>'HB-20',
        	'fabricacao' =>'2019-01-01',
        	'preco'      =>'55.000,00',
        	'resumo'     =>'Com lançamento simultâneo das três versões (hatch, sedã e aventureiro), o HB20 chegará em setembro e nós já testamos o modelo com motor 1.0 turbo na Coreia do Sul. A segunda geração manterá o motor 1.0 Kappa (80 cv e 10,2 kgfm com etanol) aspirado de três cilindros nas opções de acesso, e as mais caras virão com 1.0 turbo de injeção direta com capacidade de desenvolver 120 cv e 17,5 kgfm. O turbinado poderá vir acoplado a um câmbio manual ou automático, ambos de seis marchas.'
        ]);

        $hb20->inserirMarca('hyundai');

        $virtus = Carro::create([
        	'nome'       =>'Virtus GTS',
        	'fabricacao' =>'2020-01-13',
        	'preco'      =>'80.000,00',
        	'resumo'     =>'O sedã apimentado será equipado com motor 1.4 de 150 cv e 25,5 kgfm utilizado em modelos maiores da VW como o T-Cross.
			
			Ele é bem mais forte que as versões top do Virtus, que têm o 1.0 TSI de 128 cv e 20,4 kgfm com etanol, prometendo acelerar de zero a 100 km/h em tempos parecidos com o do antigo Golf 1.4 TSI, na casa dos 8,5 segundos.'
        ]);
        $virtus->inserirMarca('volkswagen');
     	$logan = Carro::create([
        	'nome'       =>'Logan',
        	'fabricacao' =>'2022-08-17',
        	'preco'      =>'73.000,00',
        	'resumo'     =>'O sedã de entrada da francesa Renault passará por uma reestilização e chega em julho, mas uma nova geração do Sandero já foi fotografada em testes pelo site romeno Playtech.
				
				Ou seja, esse facelift servirá para dar uma sobrevida ao modelo, que pode concorrer com a terceira geração — prevista para ser lançada 2021 na Europa e 2022 no Brasil.'
        ]);
        
        $logan->inserirMarca('renault');

        $cruize = Carro::create([
            "nome" => "Cruize",
            "fabricacao" => "2018-09-03",
            "preco" => "80.000,00",
            "resumo" => "Eleito por três anos consecutivos (2016, 2017 e 2018) pela revista Quatro Rodas a melhor compra na categoria Sedans médios de até R$ 100 mil. Premiado também na Car Awards Brasil como o melhor carro nacional, e considerado pela Auto Esporte como o melhor sedã médio para comprar.",
            "marca_id" => "5",
        ]);

        $cruize = Carro::create([
            "nome"=> "Corolla",
            "fabricacao"=> "2019-03-09",
            "preco"=> "1000",
            "resumo"=> "O modelo híbrido flex vem na versão topo de linha, Altis, e sai pelo mesmo valor do modelo com motor a combustão 2.0. Veja todos os preços da linha 2020 do Corolla",
            "marca_id"=> "7"
        ]);



    }
}
