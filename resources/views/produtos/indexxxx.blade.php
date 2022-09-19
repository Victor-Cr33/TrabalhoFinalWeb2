@extends('templates/main', ['titulo'=>"Produtos", 'rota'=>"produtos.create"])

@section('conteudo')

<div class="row">
    <div class="col">
        <x-datalist
            :title="'Produtos'"
            :crud="'produtos'"
            :header="['ID', 'NOME', 'PRECO','DESCRICAOPROMOCAO', 'DESCRICAODESCONTO', 'VALIDADE','MERCADO', 'AÇÕES']" 
            :fields="['id', 'nome','preco','descricaoPromocao', 'descricaoDesconto', 'validade', 'mercado_id']"
            :data="$data"
            :mercado="$mercados"
            :hide="[true, false, true, false, true, false, true, false]" 
            :info="['id', 'nome','preco','descricaoPromocao', 'descricaoDesconto', 'validade', 'mercado']"
            :remove="'nome'"
        />
    </div>
</div>
            
@endsection
