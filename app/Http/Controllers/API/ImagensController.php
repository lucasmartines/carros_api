<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imagen as Imagem;
use App\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ['data'=>Imagem::all()];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*store to database and to disk a file*/
        

        $imagem_em_disco = $this->salvarImagem($request);

        // guarda a imagem do arquivo salvo no banco de dados vinda da url ou do file_storage

        $nova_imagem = [
            'url' => $imagem_em_disco,
            'carro_id' => $request->carro_id
        ];


        Imagem::create($nova_imagem);
        
        return ['msg'=>'Imagem criado com sucesso'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imagem  $imagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagem = Imagem::find($id)->first();
        return ['data'=>$imagem];
    }


        
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imagem  $imagem
     * @return \Illuminate\Http\Response
     */
    public function update( $id, Request $req  )
    {   
        $imagem = Imagem::find($id);

      
        /*deletar imagem antiga*/
        $url_antiga = $imagem->url;
        Storage::delete($url_antiga);

        /*salvar imagem nova*/
        $imagem_em_disco = $this->salvarImagem($req);   
        $imagem->update(['url'=> $imagem_em_disco ]);

        return ['msg'=>'Imagem atualizado com sucesso'];        
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagem $imagen)
    {   
        $url = $imagen->url;
        // delete image fron disk deletar imagem do disco
        // deletar imagem do disco 
        Storage::delete($url);

        // delete image fron database
        $imagen->delete();
        return ['msg'=>'Imagem deletado com sucesso'];
    }

    public function inserirImagemNoCarro(Imagem $imagen,Carro $carro){

        $carro->imagen->insert($imagen);
    }
    public function salvarImagem(Request $request)
    {

        $arquivo_imagem_url = $request
                ->file('imagem')
                ->store('public/imagens_carros');

        return $arquivo_imagem_url;

    }   

}
