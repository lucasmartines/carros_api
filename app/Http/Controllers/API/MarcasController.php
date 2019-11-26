<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data' => Marca::all()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $novaMarca = $request->all();

        Marca::create($novaMarca);

        return ['msg'=>'marca criada com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return ['data'=>$marca];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->update($request->all());
        return ['msg'=>'marca atualizado com sucesso'];        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return ['msg'=>'marca deletado com sucesso'];        

    }
    public function destroyAll(){
        Marca::truncate();
        return ['msg'=>'todas as marcas deletadas com sucesso'];        

    }
    public function rules(){
        return [
            'nome' => 'required'
        ];
    }
}
