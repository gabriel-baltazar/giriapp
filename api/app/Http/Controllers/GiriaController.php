<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Giria;
use Auth;


class GiriaController extends Controller
{
    public function treatGiriaFields($giria){

        $giria->significados = explode('*', $giria->significados);
        $giria->significados = array_filter($giria->significados);
        $giria->local = explode('/', $giria->local);
        $giria->local = array_filter($giria->local);
        return $giria;
    }

    public function getGirias(){

        //fetching every entry on the giria table and slicing meanings and regions into arrays
        $girias = Giria::all();
        foreach($girias as $giria){
            $this->treatGiriaFields($giria);
        }
        return $girias;
    }

    public function getGiria($id){

        //fetching specific giria info based on id
        $giria = Giria::where('id', $id)->first();
        $this->treatGiriaFields($giria);
        return $giria;

    }

    public function filterGirias($str){

        //fetching filtered girias info on database
        $girias = Giria::where('nome', 'like', "$str%")->get();
        foreach($girias as $giria){
            $this->treatGiriaFields($giria);
        }
        return $girias;
    }

    public function newGiria(){
      return view('create');
    }

    public function createGiria(Request $request){

        $giria = new Giria;

        $giria->criadoPor = Auth::user()->id;

        $giria->nome = $request->nome;

        $locais = '';
        $significados = '';
        foreach($request->except('_token') as $key => $value){
            if(strpos($key, 'local') !== false){
                $locais .= $value.'/';
            } else if(strpos($key, 'significado') !== false){
                $significados .= $value.';*';
            }
        }
        $giria->local = substr($locais, 0 ,-1);
        $giria->significados = substr($significados, 0 ,-1);

        $giria->etimologia = isset($request->etimologia) ? $request->etimologia : null;
        $giria->imagem = '';
        if(isset($request->imagem)){
            Storage::put('public/', $request->file('imagem'));
            $giria->imagem = $request->file('imagem');
        }
        if(!empty($request->url) && $explodedURL = explode('watch?v=', $request->url)){
            $giria->videoId = $explodedURL[1];
        }

        if($giria->save()){
            app('App\Http\Controllers\HomeController')->index();
        }

        return view('create');
        
    }

    public function editGiria(Request $request, $giriaId){
        $giriaToEdit = Giria::findOrFail($giriaId);
        $giriaToEdit->local = explode('/', $giriaToEdit->local);
        $giriaToEdit->significados = explode(';*', substr($giriaToEdit->significados, 0, -1));

        return view('create', ['giriaToEdit' => $giriaToEdit]);
    }

    public function updateGiria(Request $request, $giriaId){
        $giria =  Giria::findOrFail($giriaId);

        $giria->nome = $request->nome;

        $locais = '';
        $significados = '';
        foreach($request->except('_token') as $key => $value){
            if(strpos($key, 'local') !== false){
                $locais .= $value.'/';
            } else if(strpos($key, 'significado') !== false){
                $significados .= $value.';*';
            }
        }
        $giria->local = substr($locais, 0 ,-1);
        $giria->significados = substr($significados, 0 ,-1);

        $giria->etimologia = isset($request->etimologia) ? $request->etimologia : null;
        $giria->imagem = '';
        if(isset($request->imagem)){
            Storage::put('public/', $request->file('imagem'));
            $giria->imagem = $request->file('imagem');
        }
        if(!empty($request->url) && $explodedURL = explode('watch?v=', $request->url)){
            $giria->videoId = $explodedURL[1];
        }

        if($giria->save()){
            return app('App\Http\Controllers\HomeController')->index();
        }
        
        return view('create');
    }

    public function deleteGiria($giriaId){
        $giria = Giria::find($giriaId);

        if($giria->delete()){
            app('App\Http\Controllers\HomeController')->index();
        } else {
            return view('create');
        }   
    }

}
