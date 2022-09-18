<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Mercado;

class ProdutoController extends Controller{

    public function __construct() {
        $this->middleware("Mid");
    }

    public function index() {

        $mercados = Mercado::all();
        $data = Produto::all();
        return view('produtos.index', compact(['data','mercados']));
    }

    public function create(){
       
        $mercados = Mercado::all();
    
        return view('produtos.create', compact('mercados'));
    }

    public function store(Request $request){
    
         Produto::create([
             'nome' => $request->nome,
             'preco' => $request->preco,
             'descricaoPromocao' => $request->descricaoPromocao,
             'descricaoDesconto' => $request->descricaoDesconto,
             'validade'=> $request->validade,
             'mercado_id'=>$request->mercado_id,
         ]);
 
         $obj_produto = new Produto();
         $obj_mercado = Mercado::find($request->mercado_id);
 
         if(isset($obj_mercado)){
             $obj_produto->nome = $request->nome;
             $obj_produto->preco = $request->preco;
             $obj_produto->descricaoPromocao = $request->descricaoPromocao;
             $obj_produto->descricaoDesconto = $request->descricaoDesconto;
             $obj_produto->validade = $request->validade;
             $obj_produto->mercado()->associate($obj_mercado);
             $obj_produto->save();
             return redirect()->route('produtos.index');
         }
         else{
             return "<h1>ID: $id não encontrado!"; 
             return redirect()->route('produtos.index');
         }
     }
    
}
