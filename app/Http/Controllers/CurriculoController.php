<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Storage;
use Mail;
use File;
use App\Http\Models\Curriculo;
use App\Http\Models\UsuarioVaga;
use App\Http\Models\Vaga;
use App\Http\Requests;

class CurriculoController extends Controller
{
    public function getregistrarcv(){
        $id_user = Auth::id();
        $curriculo = new Curriculo();
        $curriculo = DB::table('curriculos')->where('id', $id_user)->first();
        if($curriculo){
            return redirect('/');
        }
        return view('users/registrar');
    }
    
    public function postregistrarcv(Request $req){
        
        $curriculo = new Curriculo();
        $id_user = Auth::id();
        $pathUp = "upload/" . $id_user;
        $files = $req->file("arquivo");
        
        $curriculo->nome = $req->input('nome');
        $curriculo->cpf = $req->input('cpf');
        $curriculo->email = $req->input('email');
        $curriculo->nacionalidade = $req->input('nacionalidade');
        $curriculo->sexo = $req->input('sexo');
        $curriculo->idade = $req->input('idade');
        $curriculo->estadocivil = $req->input('estadocivil');
        $curriculo->filhos = $req->input('filhos');
        $curriculo->endereco = $req->input('endereco');
        $curriculo->estado = $req->input('uf');
        $curriculo->cidade = $req->input('cidade');
        $curriculo->telefone = $req->input('tel');
        $curriculo->rd = $req->input('rd');
        $curriculo->atividades = $req->input('atividades');
        $curriculo->xp = $req->input('xp');
        $curriculo->id_user = $id_user;
        
        if($files){
            $filename = $files->getClientOriginalName();
            $files->move(Storage_path().'/'.$pathUp, $filename);
            // Storage::putFileAs($pathUp, new File($files), $filename);
            $curriculo->arquivo = $filename;
        }
        
        $curriculo->save();
        
        return redirect('/');
    }
    
    public function enviarcv($id){
        $id_user = Auth::id();
        $user_vaga = new UsuarioVaga();
        $curriculo = new Curriculo();
        $vaga = new Vaga();
        $curriculo = DB::table('curriculos')->where('id', $id_user)->first();
        $vaga = DB::table('vagas')->where('id', $id)->first();
        if($curriculo){
            $fromEmail = $curriculo->email;
            $fromNome = $curriculo->nome;
            $uv = DB::table('usuario_vagas')->where([['id_user', $id_user],['id_vaga', $id]])->first();
            if(!($uv)){
                $user_vaga->id_vaga = $id;
                $user_vaga->id_cv = $curriculo->id;
                $user_vaga->id_user = $id_user;
                $user_vaga->save();
                
                $data = array(
                    "titulo"=> $vaga->titulo,
                    );
                
                Mail::send('emails.email', $data, function ($m) use ($fromNome, $fromEmail) {
                    $m->from('maxwell.kenned@hotmail.com', 'PublicJob');
                    $m->to($fromEmail, $fromNome);
                    $m->subject('PublicJob');
                });
            
                return redirect('/');
            }else{
                return view('errocadastro');
            }
        }else{
            return redirect('/registrarcv');
        }
    }
    
    public function perfil($id){
        $c = DB::table('curriculos')->where('id', $id)->first();
        
        return view('users/perfil')->with(['c'=>$c]);
    }
}
