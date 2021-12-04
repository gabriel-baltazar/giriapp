<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idiom;
use Auth;

class IdiomController extends Controller
{
    public function createIdiom(Request $request){
        
        $idiom = new Idiom;
        $idiom->criadoPor = $request->id; //Alterar depois para $idiom->criadoPor = Auth::user()->id;
        $idiom->expressao_pt = $request->expressao_pt;
        $idiom->expressao_en = $request->expressao_en;

        
        
       if($idiom->save()){
           return response($idiom,200);
       };
    }
    public function getIdioms(){

        $idioms = Idiom::all();
        $data = [];
        foreach($idioms  as $idiom){
            $data[] = [
                'expressao_pt' => $idiom->expressao_pt,
                'expressao_en' => $idiom->expressao_en
            ];
        }
        return $data;
    }
    public function updateIdiom(Request $request, $idiomId){

        $updateIdiom = Idiom::findOrFail($idiomId);
        $updateIdiom->expressao_pt = $request->expressao_pt;
        $updateIdiom->expressao_en = $request->expressao_en;

        if($updateIdiom->save()){
            return response($updateIdiom,200);
        }
    }
    public function deleteIdiom($idiomId){

        $idiom = Idiom::find($idiomId);

        if($idiom->delete()){
            return response("Ok",200);
        } 
    }
}
