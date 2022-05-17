<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProduto extends Model
{
    use HasFactory;

    protected $fillable = [
        'compra_id',
        'produto_id',
        'preco',
        'quantidade'
        ];

    public function compra(){
        return $this->belongsTo(Compra::class);
    }
    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
