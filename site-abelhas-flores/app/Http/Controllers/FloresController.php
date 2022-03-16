<?php

namespace App\Http\Controllers;

use App\Abelha;
use App\Flores;
use App\Http\Requests\CreateFlores;
use Illuminate\Support\Facades\DB;

class FloresController extends Controller
{
    public function index(){

        try {
            $abelhas = Abelha::get();

        } catch (\Throwable $e) {
            report($e);
            return back()->with('errormsg', 'Erro ao obter dados para carregamento da págian.');
        }
        return view('cadastro.flores', ['abelhas' => $abelhas]);
    }

    public function create(CreateFlores $request){

        $meses = $request->meses;

        $string  = implode(', ', array_slice($request->meses, 0, -1));
        $string .= ' e ' . $meses[count($meses)-1];

        $request['meses'] = $string;

        if($request->foto_flor->isValid()){
            $nameFile = $request->nome_flor.'.'.$request->foto_flor->extension();
            $request->file('foto_flor')->move('img/fotosFlores', $nameFile);
            $request['foto_flor'] = $nameFile;
        }

        $id_abelhas = $request->abelhas;
        $abelhas = [];
        foreach($id_abelhas as $id){
            $abelhas_flores = DB::select('SELECT nome_abelha FROM abelhas WHERE id_abelha = ?', [$id]);
            foreach($abelhas_flores as $ab){
                array_push($abelhas, $ab->nome_abelha);

            }
        }

        $nome_abelhas  = implode(', ', array_slice($abelhas, 0, -1));
        $nome_abelhas .= ' e ' . $abelhas[count($abelhas)-1];

        $dados = array(
            'nome_flor' => $request->nome_flor,
            'especie_flor' => $request->especie_flor,
            'descricao'  => $request->descricao,
            'meses' => $request->meses,
            'foto_flor' => $nameFile,
            'abelhas' => $nome_abelhas

        );

        try {

            $id_flor = DB::table('flores')->insertGetId($dados);
            $abelha_flor = new AbelhasFloresController;
            foreach($id_abelhas as $id){
                $abelha_flor->create($id_flor, $id);
            }

        } catch (\Throwable $e) {

            return back()->with($e);
        }

        return back()->with('msg', 'Flor cadastrada com sucesso!');
    }

}
