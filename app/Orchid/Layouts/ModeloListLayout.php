<?php

namespace App\Orchid\Layouts;
use App\Models\modeloModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class ModeloListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = '';

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
                ->render(function (modeloModel $impressoras) {
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
                ->render(function (modeloModel $impressoras) {
                    return ModalToggle::make($impressoras->col_setor)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $impressoras->col_id,
                    ]);
                }),
            ];
    }
}
