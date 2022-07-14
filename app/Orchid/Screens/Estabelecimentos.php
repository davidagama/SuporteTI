<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Orchid\Layouts\EstabelecimentosListLayout;
use App\Models\EstabelecimentosModel;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;



class Estabelecimentos extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [

            'tb_estabelecimentos' => EstabelecimentosModel::filters()->defaultSort('col_id')->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */

    public $description = 'Estabelecimentos';


    public function name(): ?string
    {
        return 'Estabelecimentos';
       
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

            EstabelecimentosListLayout::class,
        ];
    }


    

    
}
