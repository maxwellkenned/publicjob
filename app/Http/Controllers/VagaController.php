<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\City;
use App\Http\Models\State;
use DB;
use App\Http\Requests;

class VagaController extends Controller
{
    public function getcadastrarvaga(){
        $state = new State();
        $state = DB::table('states')->orderBy('abbr')->get();
        return view('cadastrarVaga')->with('state',$state);
    }
    public function getcidades($uf){
        $cities = new City();
        $state = DB::table('states')->where('abbr', $uf)->first();
        $cities = DB::table('cities')->where('state_id', $state->id)->orderBy('name')->get();
        if($cities){
            return json_encode($cities);
        }
    }
    public function postcadastrarvaga(Request $request){
        return json_encode($request->input());
    }
}
