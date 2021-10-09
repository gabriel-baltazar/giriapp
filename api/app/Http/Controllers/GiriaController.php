<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giria;

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
        return $request;
    }

}
