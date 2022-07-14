<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class EstabelecimentosModel extends Model
{
    use AsSource, Filterable;

    /**
     * @var array
     */
    protected $fillable = [
        'col_id',
        'col_codigo',
        'col_nomefantasia',
        'col_ecf',
        'col_cnpj',
        'col_endereco'
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'col_id',
        'col_codigo',
        'col_nomefantasia',
        'col_ecf',
        'col_cnpj',
        'col_endereco'
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'col_id',
        'col_nomefantasia',
    ];

    protected $table = 'tb_estabelecimentos';

    

}
