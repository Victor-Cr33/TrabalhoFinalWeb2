<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model{
  
    use HasFactory;
    use SoftDeletes;

    protected $table ="produtos";
    protected $fillable = ['nome', 'preco', 'descricaoPromocao', 'descricaoDesconto', 'data','mercado_id'];

    public function mercado(){

        return $this->belongsTo('App\Models\Mercado');
    }
}
