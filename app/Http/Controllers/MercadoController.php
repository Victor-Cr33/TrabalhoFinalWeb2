<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mercado;

class MercadoController extends Controller{

    public function __construct() {
        $this->middleware("Mid");
    }

    public function index() {

        $data = Mercado::all();

        return view('mercados.index', compact('data'));
    }

    public function create(){


        return view('mercados.create');
    }

    public function store(Request $request){

              $obj_mercado = new Mercado();

              if(isset($obj_mercado)){
                  $obj_mercado->nome = $request->nome;
                  $obj_mercado->cnpj = $request->cnpj;
                  $obj_mercado->nomeProprietario = $request->nomeProprietario;
                  $obj_mercado->save();
              }

          $user = auth()->user();
          $user->mercado_id = $user->id;

          return redirect('/')->with("mercado cadastrado");


      }


}
