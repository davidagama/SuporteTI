<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

class TecnicosModel extends Model
{
    use AsSource, Filterable;

    /**
     * @var array
     */
    protected $fillable = [
       'id',
       'col_nome',
       'col_matricula',
        
    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
       'col_nome',
       'col_matricula',
    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
       'col_nome',
       'col_matricula',
      
    ];

    protected $table = 'tecnicos';

    public function plantao(){
        return $this->hasMany('App\Models\PlantoesModel');
    }

    public function plantao1(){
        return $this->belongsTo('App\Models\PlantoesModel')->select(array('col_nome'));
    }

}
