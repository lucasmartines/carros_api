<?php

use Illuminate\Database\Seeder;
use App\Marca;
class MarcasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Marca::create([
    		'nome'=>'sem_marca'
    	]);
    	
    	Marca::create([
    		'nome'=>'renault'
    	]);
    	Marca::create([
    		'nome'=>'volkswagen'
    	]);
    	Marca::create([
    		'nome'=>'hyundai'
    	]);
    	Marca::create([
    		'nome'=>'chevrolet'
    	]);
    	Marca::create([
    		'nome'=>'audi'
    	]);
    	Marca::create([
    		'nome'=>'toyota'
    	]);
    	Marca::create([
    		'nome'=>'honda'
    	]);
    	Marca::create([
    		'nome'=>'mercedes'
    	]);

    }
}
