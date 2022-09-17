<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mercado extends Model{
    
    use HasFactory;
    use SoftDeletes;
    protected $table = "mercados";
    protected $fillable = ['nome','cnpj','nomeProprietario'];
    
    public function produto(){
        return $this->hasMany('App\Models\Produto');
    }
}
