<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giria;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        if($giriasDesseUsuario = Giria::where('criadoPor', $userId)->get()){
            foreach($giriasDesseUsuario as $giria){
                // $giria = json_decode($giria);
                $giria->significados = explode("*", $giria->significados);
            }
        }


        return view('home', ['giriasDesseUsuario' => $giriasDesseUsuario]);
    }
}
