<?php

namespace App\Orchid\Layouts;

use App\Models\PlantoesModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\DateRange;
use Orchid\Support\Facades\Layout;


class PlantoesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'plantao';




    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [


            TD::make('col_data', 'Data')
                ->sort()
                ->filter(TD::FILTER_DATE)
                ->render(function (PlantoesModel $plantao) {
                    return ModalToggle::make(date_format($plantao->col_data, 'd-m-Y'))
                        ->modal('Alterar')
                        ->method('update')
                        ->parameters([
                            'id' => $plantao->id,
                        ]);
                }),


            TD::make('tecnicos_id', 'Técnico')
                ->render(function (PlantoesModel $plantao) {
                    return  ModalToggle::make($plantao->tecnico->col_nome)
                        ->modal('Alterar')
                        ->method('update')
                        ->parameters([
                            'id' => $plantao->id,
                        ]);
                }),

            TD::make('Action', 'Ação')
                ->render(function (PlantoesModel $plantao) {
                    return ModalToggle::make('')
                        ->modal('exclusao')
                        ->method('remove')
                        ->icon('trash')->parameters([
                            'id' => $plantao->id,
                        ]);
                }),
        ];
    }
}
