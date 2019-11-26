<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Marca;
class Carro extends Model
{

    protected $guarded = ['id'];
    protected $with = ['imagens','marca'];
    

    public function imagens(){
    	return $this->hasMany('App\Imagen');
    }
 	public function marca(){
    	return $this->belongsTo('App\Marca');
    }
    public function motors(){
    	return $this->hasMany('App\Motors');	
    }

    /**
    * Inserir Marca serve para assossiar uma marca ao 
    * carro, basta passar como parametro opcional um
    * numero que é o id, ou o nome da marca, exemplo:
    * chevrolet, se não existir uma marca uma exceção é lançada
    *
    * @param nomeMarca
    */

    public function inserirMarca($nomeMarca = "sem_marca"){
        $marca = [];

        if( is_numeric($nomeMarca)){
            $idMarca = $nomeMarca;
            $marca = Marca::find($idMarca);
        }
        else{
            $marca = Marca::where('nome',$nomeMarca)->first();
        }
        
        if($marca){
          // marca do carro = marca 
            $this->marca_id = $marca->id;
            $this->save();
        }
        else
        {
            throw new \Exception("Erro, não existe essa marca", 1000);
        }
    }
       
}
