<?php

namespace App\Orchid\Layouts;
use App\Models\ImpressorasModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class ImpressorasListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tb_kyoceras';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('col_local', 'Local')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_local)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
                TD::make('col_setor', 'Setor')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_setor)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
                TD::make('col_modelo', 'Modelo')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_modelo)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
                TD::make('col_numserie', 'Número de Série')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_numserie)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
                TD::make('col_ipinterno', 'IP Interno')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_ipinterno)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
                TD::make('col_mac', 'MAC')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_mac)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
                
                TD::make('col_endereco', 'Endereço')
                
                
                /* ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_endereco)
                    /* ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }) */,
                TD::make('col_obs', 'Observação')
                
                
                /* ->render(function (ImpressorasModel $impressoras) {
                    return ModalToggle::make($impressoras->col_obs)
                    /* ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }) */,
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
