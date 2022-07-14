<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Orchid\Layouts\DominiosListLayout;
use App\Models\DominiosModel;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;



class Dominios extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [

            'tb_ip_dominio' => DominiosModel::filters()->defaultSort('col_id')->paginate(),
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
        return 'Domínios';
       
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

            DominiosListLayout::class,
        ];
    }


    

    
}
