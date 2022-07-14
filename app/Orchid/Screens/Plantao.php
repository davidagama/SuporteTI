<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Orchid\Layouts\PlantoesListLayout;
use App\Models\PlantoesModel;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\DateRange;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Relation;
use App\Models\TecnicosModel;
use Symfony\Component\Console\Helper\FormatterHelper;

class Plantao extends Screen
{


    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [



            'plantao' => PlantoesModel::filters()->defaultSort('col_data', 'desc')->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */

    public $description = 'Lista de plantoes';


    public function name(): ?string
    {
        return 'Plantoes';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Novo Plantão')
                ->modal('Novo')
                ->method('create')
                ->icon('pencil'),



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


            PlantoesListLayout::class,
            // Layout::rows([

            //     Group::make([
            //         DateRange::make('rangeDate')
            //                 ->title('Range date'),
            //     ]),
            // ]),

            //Modal responsável pela pergunta de confirmação de exclusão
            Layout::modal('exclusao', Layout::rows([
                Label::make('plantao.col_data')
                    ->title('Excluir plantão: ')
                    ->format('d-m-Y'),

                Relation::make('plantao.tecnicos_id')
                    ->title('Com o técnico: ')
                    
                    ->fromModel(TecnicosModel::class, 'col_nome')

            ]))->title('Confirmar exclusão?')
                ->applyButton('Excluir')
                ->closeButton('Cancelar')
                ->async('asyncGetData'),

            //Cadastrar novo plantão através de uma modal
            Layout::modal('Novo', Layout::rows([
                Input::make('plantao.col_data')
                    ->type('date')
                    ->title('Data')
                    ->format('d-m-Y')
                    ->horizontal(),

                Relation::make('plantao.tecnicos_id')
                    ->title('Técnico')
                    
                    ->required()
                    ->placeholder('Selecione o técnico')
                    ->help('Selecione o técnico para este plantão')
                    ->fromModel(TecnicosModel::class, 'col_nome'),




            ]))->title('Novo plantão')
                ->applyButton('Cadastrar')
                ->closeButton('Cancelar'),


            //Alterar plantão existente através de uma modal
            Layout::modal('Alterar', Layout::rows([
                Input::make('plantao.col_data')
                    ->method('update')
                    ->format('d-m-Y')
                    ->type('date')
                    ->title('Data')
                    ->horizontal(),



                Relation::make('plantao.tecnicos_id')
                    ->title('Com o técnico: ')
                    ->required()
                    ->fromModel(TecnicosModel::class, 'col_nome')


            ]))->title('Alterar plantão')
                ->applyButton('Alterar')
                ->closeButton('Cancelar')
                ->async('asyncGetData'),

        ];
    }



    //Método responsável por carregar os dados de uma plantão existente na modal para serem alterados
    /**
     * Query data.
     *
     * @param PlantoesModel $plantao
     *
     * @return array
     */
    public function asyncGetData(PlantoesModel $plantao): array
    {
        return [
            'plantao' => $plantao,
            //date_format($plantao->col_data, 'd-m-Y')

        ];
    }


    /**
     * @param PlantoesModel $plantao
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(PlantoesModel $plantao, Request $request)
    {
        $plantao->fill($request->get('plantao'))->save();

        Toast::success('plantao ' . date_format($plantao->col_data, 'd-m-Y') . ' cadastrada com sucesso!');

        return redirect()->route('platform.plantao');
    }


    /**
     * @param PlantoesModel $plantao
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PlantoesModel $plantao, Request $request)
    {
        $plantao->fill($request->get('plantao'))->save();

        Toast::success('plantão ' . date_format($plantao->col_data, 'd-m-Y') . ' alterada com sucesso!');

        return redirect()->route('platform.plantao');
    }


    /**
     * @param PlantoesModel $plantao
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(PlantoesModel $plantao)
    {

        $plantao->delete();

        Toast::success('plantao ' . date_format($plantao->col_data, 'd-m-Y') . '  excluída com sucesso!');

        return redirect()->route('platform.plantao');
    }
}
