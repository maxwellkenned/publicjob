<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\City;
use App\Http\Models\State;
use App\Http\Models\Vaga;
use DB;
use Auth;
use App\Http\Requests;

class VagaController extends Controller
{
    public function getcadastrarvaga(){
        $state = new State();
        $state = DB::table('states')->orderBy('abbr')->get();
        return view('admin/cadastrarVaga');
    }
    public function getcidades($uf){
        $cities = new City();
        $state = DB::table('states')->where('abbr', $uf)->first();
        $cities = DB::table('cities')->where('state_id', $state->id)->orderBy('name')->get();
        if($cities){
            return json_encode($cities);
        }
    }
    public function getestados(){
        $states = new State();
        $states = DB::table('states')->orderBy('abbr')->get();
        if($states){
            return json_encode($states);
        }
    }
    public function getvagas($txt  = null){
        $vagas = new Vaga();
        $crit = $txt? $txt: '';
        $vagas = DB::table('vagas')->orderBy('updated_at', 'DESC')->where('titulo', 'like', '%'.$crit.'%')->get();

        die(json_encode($vagas));
        
    }
    public function postcadastrarvaga(Request $request){
        $vaga = new Vaga();
        $id_user = Auth::id();
        $dt_iniSplit = explode('/', $request->input('dtini'));
        $dt_ini = $dt_iniSplit[2].'-'.$dt_iniSplit[1].'-'.$dt_iniSplit[0];
        $dt_finSplit = explode('/', $request->input('dtfin'));
        $dt_fin = $dt_finSplit[2].'-'.$dt_finSplit[1].'-'.$dt_finSplit[0];
        if($request->input()){
            $vaga->empresa = $request->input('empresa');
            $vaga->titulo = $request->input('titulo');
            $vaga->jornada = $request->input('jornada');
            $vaga->contrato = $request->input('contrato');
            $vaga->salario = $request->input('salario');
            $vaga->UF = $request->input('uf');
            $vaga->cidade = $request->input('cidade');
            $vaga->descricao = $request->input('descricao');
            $vaga->exigencias = $request->input('exigencias');
            $vaga->beneficios = $request->input('beneficios');
            $vaga->dt_ini = $dt_ini;
            $vaga->dt_fin = $dt_fin;
            $vaga->id_user = $id_user;
            $vaga->save();
        }
        
        return redirect('/');
    }
}
