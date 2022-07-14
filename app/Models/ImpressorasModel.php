<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class ImpressorasModel extends Model
{
    use AsSource, Filterable;

    /**
     * @var array
     */
    protected $fillable = [
        'col_id',
        'col_local',
        'col_setor',
        'col_modelo',
        'col_numserie',
        'col_ipinterno',
        'col_mac',
        'col_obs',
        'col_endereco'
        
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'col_id',
        'col_local',
        'col_setor',
        'col_modelo',
        'col_numserie',
        'col_ipinterno',
        'col_mac',
        'col_obs',
        'col_endereco'
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        
        'col_local',
      
      
    ];

    protected $table = 'tb_kyoceras';

    

}
