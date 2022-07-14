<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class TabelasModel extends Model
{
    use AsSource, Filterable;

    /**
     * @var array
     */
    protected $fillable = [
        'col_nome_tabela'
        
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'col_id',
        'col_nome_tabela'
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'col_id',
        'col_nome_tabela'
      
    ];

    protected $table = 'tb_tabelas';

    

}
