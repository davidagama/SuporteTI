<?php

namespace App\Orchid\Layouts;
use App\Models\TabelasModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class TabelaslistLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tb_tabelas';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('col_nome_tabela', 'Tabelas')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (TabelasModel $tabela) {
                    return ModalToggle::make($tabela->col_nome_tabela)
                    ->modal('visualizar')
                    ->method('view')
                    ->parameters([
                        'col_id' => $tabela->col_id,
                    ]);
                
                }),
               
                
            ];
    }
}
