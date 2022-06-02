<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'razao_social',
        'endereco',
        'cidade',
        'cep',
        'telefone',
        'nomeFantasia'
    ];
}
