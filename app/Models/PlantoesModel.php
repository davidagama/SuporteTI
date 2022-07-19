<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PlantoesModel extends Model
{
    use AsSource, Filterable;


    protected $dates = ['col_data'];
    //protected $dateFormat = 'm-d-Y';
    public function getData2Attribute()
    {
        return date('m-d-Y', strtotime($this->attributes['col_data']));
    }
    protected $appends = ['col_data'];

/**
     * The "booted" method of the model.
     * 
     * Essa função modifica a exibição da tabela de plantões
     * fazendo com que a mesma exiba apenas os plantoes do mes e ano atual
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('data', function (Builder $builder) {
            $builder->whereMonth('col_data', now())->whereYear('col_data', now());
        });
    }




    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'col_data',
        'col_criadoem',
        'col_atualizadoem',
        'tecnicos_id',



    ];

    /**
     * Name of columns to which http sorting can be applied
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'col_data',
        'col_criadoem',
        'col_atualizadoem',
        'tecnicos_id',

    ];

    /**
     * Name of columns to which http filter can be applied
     *
     * @var array
     */
    protected $allowedFilters = [

        'col_data',


    ];

    protected $table = 'plantao';


    // adicionado a relação um tecnico para uma plantao
    // a migration dessa relação é AddForeignKeysToTbPlantaoTable
    public function tecnico()
    {
        return $this->belongsTo(TecnicosModel::class, 'tecnicos_id')->select(array('col_nome'));
    }

    public function tecnico1()
    {
        return $this->hasMany('App\Models\TecnicosModel');
    }
}
