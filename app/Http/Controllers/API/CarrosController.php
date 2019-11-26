<?php

namespace App\Http\Controllers\API;

use App\Carro;
use App\Marca;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;

class CarrosController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data'=>Carro::all()];
    }
    /**
    *   Display search list of this resource
    */
    public function query(Request $request){
    

        if($request['marca']){
            $encontrados = Carro::WhereHas('marca',function (Builder $query)use($request) {
                $query->where('nome', 'like', "%". $request['marca'] . "%");
            })->get();
        }
        else if($request['q']){
           $encontrados = Carro::where('nome','like',"%{$request['q']}%")->get(); 
           //dd($request['q']);
        }
        else {
            $encontrados = Carro::all();
        }
        return ['data'=>$encontrados];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());

        $novo_carro = new Carro($request->except('marca'));
        
        if($marca = $request->input('marca') ){
            $novo_carro->inserirMarca ( $marca ) ;
        }
        $novo_carro->save();


        return ['msg'=>'Carro criado com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = Carro::find($id)->first();
        return ['data'=>$carro];
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Carro $carro )
    {   
        $request->validate($this->rules());
        $carro->update($request->all());
        return ['msg'=>'Carro atualizado com sucesso'];        
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carro $carro)
    {
        $carro->delete();
        return ['msg'=>'Carro deletado com sucesso'];
    }

    public function insert_brand($id_carro,$id_marca){
        echo "$id_carro  $id_marca";
        
        $carro = null;
        
        // if is a number it would be a id if not it would be a string
        if(!is_numeric($id_carro)){
            $nome_carro = $id_carro;
            $carro = Carro::where('nome',$nome_carro)->first();
        }
        else{
            $carro = Carro::find($id_carro);
        }
        $carro->inserirMarca($id_marca);

        return ['msg'=>"Carro atualizado com sucesso, e marca inserida"];
    }


    public function rules(){
        return [
            'nome'=>'required|unique:carros|max:40',
            'fabricacao' => 'date'
        ];
    }
}
