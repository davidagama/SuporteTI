<?php

namespace App\Orchid\Layouts;
use App\Models\EstabelecimentosModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;

class EstabelecimentosListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'tb_estabelecimentos';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('col_codigo', 'Código')
                ->sort()
                ->filter(TD::FILTER_NUMERIC)
                ->render(function (EstabelecimentosModel $estabelecimento) {
                    return ModalToggle::make($estabelecimento->col_codigo)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $estabelecimento->col_id,
                    ]);
                }),
                TD::make('col_nomefantasia', 'Nome Fantasia')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (EstabelecimentosModel $estabelecimento) {
                    return ModalToggle::make($estabelecimento->col_nomefantasia)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $estabelecimento->col_id,
                    ]);
                }),
                TD::make('col_ecf', 'ECF')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (EstabelecimentosModel $estabelecimento) {
                    return ModalToggle::make($estabelecimento->col_ecf)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $estabelecimento->col_id,
                    ]);
                }),
                TD::make('col_cnpj', 'CNPJ')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (EstabelecimentosModel $estabelecimento) {
                    return ModalToggle::make($estabelecimento->col_cnpj)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $estabelecimento->col_id,
                    ]);
                }),
                TD::make('col_endereco', 'Endereço')
                ->sort()
                ->filter(TD::FILTER_TEXT)
                ->render(function (EstabelecimentosModel $estabelecimento) {
                    return ModalToggle::make($estabelecimento->col_endereco)
                    /* ->modal('Alterar')
                    ->method('update') */
                    ->parameters([
                        'col_id' => $estabelecimento->col_id,
                    ]);
                }),
            ];
    }
}
