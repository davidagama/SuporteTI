<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Orchid\Layouts\ModeloListLayout;
use App\Models\ModeloModel;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;



class Modelo extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [

            '' => ModeloModel::filters()->defaultSort('col_id')->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */

    public $description = 'Lista de tabelas';


    public function name(): ?string
    {
        return 'Modelo';
       
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

            ModeloListLayout::class,
            ModeloListLayout::class,
        ];
    }


    

    
}
