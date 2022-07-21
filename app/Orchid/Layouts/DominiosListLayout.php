<?php

namespace App\Orchid\Layouts;
use App\Models\DominiosModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class DominiosListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tb_ip_dominio';



    public static function perPage(): int
    {
        return 30;
    }
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('col_lojas', 'Nome')
                ->sort()
                /*->render(function (DominiosModel $dominio) {
                    return ModalToggle::make($dominio->col_lojas)
                     ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $dominio->col_id,
                    ]);
                })*/,
                TD::make('col_numero', 'N°')
                ->sort()
                ->filter(TD::FILTER_NUMERIC)
                /*->render(function (DominiosModel $dominio) {
                    return ModalToggle::make($dominio->col_numero)
                     ->modal('Alterar')
                    ->method('update')
                    ->parameters([
                        'col_id' => $dominio->col_id,
                    ]);
                }) */,
                TD::make('col_ip', 'IP')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                /*->render(function (DominiosModel $dominio) {
                    return ModalToggle::make($dominio->col_ip)
                     ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $dominio->col_id,
                    ]);
                })*/,
                TD::make('col_iptef', 'IP TEF')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                /*->render(function (DominiosModel $dominio) {
                    return ModalToggle::make($dominio->col_iptef)
                     ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $dominio->col_id,
                    ]);
                })*/,
                TD::make('col_ipsom', 'IP SOM')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                /*->render(function (DominiosModel $dominio) {
                    return ModalToggle::make($dominio->col_ipsom)
                     ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $dominio->col_id,
                    ]);
                })*/,
                TD::make('col_dominio', 'Domínio')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                /*->render(function (DominiosModel $dominio) {
                    return ModalToggle::make($dominio->col_dominio)
                     ->modal('Alterar')
                    ->method('update') 
                    ->parameters([
                        'col_id' => $dominio->col_id,
                    ]);
                })*/,
            ];
    }
}
