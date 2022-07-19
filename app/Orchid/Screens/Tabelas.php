<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;

use App\Models\TabelasModel;
use App\Models\DominiosModel;
use App\Models\ImpressorasModel;
use App\Models\EstabelecimentosModel;
use App\Orchid\Layouts\TabelaslistLayout;
use App\Orchid\Layouts\DominiosListLayout;
use App\Orchid\Layouts\EstabelecimentosListLayout;
use App\Orchid\Layouts\ImpressorasListLayout;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screens\Fields\Label;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Repository;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Modal;
use App\Orchid\Layouts\MenuPlanilhas;
use Orchid\Screen\Action;






class Tabelas extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [

            ##Retorna a lista de objetos do banco de dados
            'tb_kyoceras' => ImpressorasModel::filters()->defaultSort('col_id')->paginate(),
            'tb_ip_dominio' => DominiosModel::filters()->defaultSort('col_numero')->paginate(),
            'tb_tabelas' => TabelasModel::filters()->defaultSort('col_id')->paginate(),
            'tb_estabelecimentos' => EstabelecimentosModel::filters()->defaultSort('col_id')->paginate(),
        ];
    }

    /**
     * Display header name.
     * {{date('Y')}}
     * @return string|null
     */

    public $description = 'Lista de tabelas';


    public function name(): ?string
    {
        return 'Tabelas';
       
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            ModalToggle::make('Launch demo modal')
            ->modal('exampleModal')
            ->method('action')
            ->icon('full-screen'),

            Link::make('Website')
            ->route('platform.dominios')
            ->icon('globe-alt'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {

       
        return [
          

           

 
            ##TabelaslistLayout::class, 
            ##MenuPlanilhas::class,
          /*   Layout::view('platform::partials.home'),

            Layout::modal('visualizar',[
               
                TabelaslistLayout::class, 
                
                
                ])->title('Visualizar')
                ->async('asyncGetData')
                ->size(Modal::SIZE_LG)
               ->closeButton('Fechar')

               ->withoutApplyButton(), */
               
               Layout::tabs([
                'Ips e Domínios' => DominiosListLayout::class,
                'Estabelecimentos' => EstabelecimentosListLayout::class,
                'Kyoceras' => ImpressorasListLayout::class,
            ]),
               
        ];
    }

/**
 * The number of links to display on each side of current page link.
 *
 * @return int
 */
protected function onEachSide(): int
{
    return 3;
}
    

    
}
