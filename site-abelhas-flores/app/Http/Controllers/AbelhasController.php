<?php

namespace App\Http\Controllers;

use App\Abelha;
use App\Flores;
use App\Http\Requests\CreateAbelhas;
use App\Meses;
use Illuminate\Support\Facades\DB;
use Throwable;

class AbelhasController extends Controller
{
    public function index(){

        return view('cadastro.abelhas');
    }

    public function getAll(){

        try {

            if(Abelha::get()->isEmpty()){
                $insert = "INSERT INTO abelhas (nome_abelha, especie_abelha) VALUES
                ('Uruçu', 'Melipona Scutellaris'),
                ('Uruçu-Amarela', 'Melipona Rufiventris'),
                ('Guarupu','Melipona Bicolor'),
                ('Iraí','Nannotrigona Testaceicornes'),
                ('Jataí','Tetragonisca Angustula'),
                ('Jataí-da-Terra','Paratrigona Subnuda'),
                ('Mandaçaia','Melipona Mandaçaia'),
                ('Manduri','Melipona Marginata'),
                ('Tubuna','Scaptotrigona Bipunctata'),
                ('Mirim Droryana','Plebeia Droryana'),
                ('Mirim-Guaçu','Plebeia Remota'),
                ('Mirim-Preguiça','Friesella Schrottkyi'),
                ('Lambe-Olhos','Leurotrigona Muelleri'),
                ('Borá','Tetragona Clavipes'),
                ('Guira','Geotrigona Mumbuca'),
                ('Marmelada Amarela','Freseomelitta Varia'),
                ('Mambucão','Cephalotrigona Capitata'),
                ('Guiruçu','Schwarziana Quadripunctata'),
                ('Tataíra','Oxytrigona Tataira Tataira'),
                ('Irapuã','Trigona Spinipes'),
                ('Abelha-Limão','Lestrimelitta Limao'),
                ('Bieira','Mourella Caerulea');";
                DB::statement($insert);
            }

            $abelhas = Abelha::get();
            $flores = Flores::paginate(6);

        } catch (\Throwable $e) {
            report($e);
            return back()->with('errormsg', 'Erro ao obter dados para carregamento da págian.');
        }

        return view('home', ['abelhas' => $abelhas], ['flores' => $flores]);
    }

    public function create(CreateAbelhas $request){

        try {

            Abelha::create($request->all());

        } catch (Throwable $e) {
            report($e);

            return back()->with('errormsg', 'Erro ao cadastra abelha.');
        }


        return back()->with('msg', 'Abelha cadastrada com sucesso!');
    }

}
