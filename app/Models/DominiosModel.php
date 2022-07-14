<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class DominiosModel extends Model
{
    use AsSource, Filterable;

   
    /**
     * @var array
     */
    protected $fillable = [
        'col_id',
        'col_lojas',
        'col_numero',
        'col_ip',
        'col_iptef',
        'col_ipsom',
        'col_dominio'
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'col_id',
        'col_lojas',
        'col_numero',
        'col_ip',
        'col_iptef',
        'col_ipsom',
        'col_dominio'
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'col_numero',
        'col_ip',
    ];

    protected $table = 'tb_ip_dominio';

    

}
