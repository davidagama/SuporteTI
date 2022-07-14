<?php

namespace App\Orchid\Layouts;

use App\Models\TecnicosModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class TecnicosListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tecnicos';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('col_nome', 'Nome')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (TecnicosModel $tecnicos) {
                    return ModalToggle::make($tecnicos->col_nome)
                        ->modal('Alterar')
                        ->method('update')
                        ->parameters([
                            'id' => $tecnicos->id,
                        ]);
                }),
            TD::make('col_matricula', 'Matrícula')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (TecnicosModel $tecnicos) {
                    return ModalToggle::make($tecnicos->col_matricula)
                        ->modal('Alterar')
                        ->method('update')
                        ->parameters([
                            'id' => $tecnicos->id,
                        ]);
                }),

            TD::make('Action', 'Ação')
                ->render(function (TecnicosModel $tecnicos) {
                    return ModalToggle::make('')
                        ->modal('exclusao')
                        ->method('remove')
                        ->icon('trash')->parameters([
                            'id' => $tecnicos->id,
                        ]);
                }),
        ];
    }
}
