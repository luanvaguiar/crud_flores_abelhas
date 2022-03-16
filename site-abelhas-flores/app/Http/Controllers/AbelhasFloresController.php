<?php

namespace App\Http\Controllers;

use App\Abelha;
use App\AbelhasFlores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbelhasFloresController extends Controller
{
    public function create($id_flor, $id_abelha){
        $request = new Request;
        $request['id_flor'] = $id_flor;
        $request['id_abelha'] = $id_abelha;

        AbelhasFlores::create($request->all());

        return true;
    }

    public function filtrar(Request $request){

        $query = "SELECT * FROM flores";
        $results = null;
        $abelhas = Abelha::get();

        if($request->has('abelhas') || $request->has('meses')){
            if($request->has('abelhas')){
                $query .= ' '."INNER JOIN abelhas_flores ON abelhas_flores.id_abelha = ".$request->abelhas;
            }
            if($request->has('meses') && $request->meses > 1){
                $query .= ' '."WHERE 1=1";
                foreach($request->meses as $mes){
                    $query .= ' '."AND flores.meses like '%".$mes."%'";
                }
            }

            if($request->has('abelhas') || $request->has('meses')){
                $results = DB::select($query);

                if(count($results) <= 0){
                    return redirect('/')->with('msgfiltro', 'Nenhum resultado encontrado na pesquisa feita.');
                }
            }else{
                return redirect('/')->with('msgfiltro', 'Nenhum resultado encontrado na pesquisa feita.');
            }

        }else{
            return redirect('/')->with('msgfiltro', 'Nenhum resultado encontrado na pesquisa feita. Por favor, adicione algum filtro.');
        }

        return view('filtro', ['resultados' => $results], ['abelhas' => $abelhas]);
    }
}
