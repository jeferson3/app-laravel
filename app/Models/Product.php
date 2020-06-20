<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    # o nome da tabela é gerado automaticamente com o nome do model no plural

    //pra por um nome personalizado usar
    // $table = nomePersonalizado;

    //especificando todas as colunas que podem ser escritas, com o metodo create;
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function search($filter)
    {
        $results = $this->where(function ($query) use ($filter) {
            if ($filter) {
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $results;
    }
}
