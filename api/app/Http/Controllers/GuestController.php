<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giria;

class GuestController extends Controller
{
    public function index(){
        $giriaHoje = '';
        if(count(Giria::get()) > 0){
            $giriaHoje = Giria::inRandomOrder()->first();
            $giriaHoje->significados = explode("*", $giriaHoje->significados);
        }
        
        return view("welcome", ['giriaHoje' => $giriaHoje]);
    }
}
