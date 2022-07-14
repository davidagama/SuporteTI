<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Orchid\Layouts\TecnicosListLayout;
use App\Models\TecnicosModel;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Relation;
use Exception;
use PDOException;
use Orchid\Screen\Fields\Select;
use PhpParser\Node\Stmt\TryCatch;

class Tecnicos extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [

            'tecnicos' => TecnicosModel::filters()->defaultSort('id')->paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */

    public $description = 'Lista de tecnicos';


    public function name(): ?string
    {
        return 'Tecnicos';
       
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'platform.tecnicos',
        ];
    }
    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Novo')
                ->modal('Novo')
                ->method('create')
                ->icon('pencil')
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

            TecnicosListLayout::class,

           

            //Modal responsável pela pergunta de confirmação de exclusão
            Layout::modal('exclusao', Layout::rows([
                Label::make('tecnicos.col_nome')
                ->title('Excluir técnico: ')
                
                ]))->title('Confirmar exclusão?')
                ->applyButton('Excluir')
                ->closeButton('Cancelar')
                ->async('asyncGetData'),
            
            //Cadastrar nova plantão através de uma modal
            Layout::modal('Novo', Layout::rows([
                Input::make('tecnicos.col_nome')
                ->type('text')
                ->title('Nome')
                ->horizontal(),

                Input::make('tecnicos.col_matricula')
                ->type('number')
                ->title('Matrícula')
                ->horizontal(),

                

                
                
                
                ]))->title('Novo técnico')
                ->applyButton('Cadastrar')
                ->closeButton('Cancelar'),


                //Alterar plantão existente através de uma modal
                Layout::modal('Alterar', Layout::rows([
                    Input::make('tecnicos.col_nome')
                        ->title('Nome')
                        ->required(),
    
                    Input::make('tecnicos.col_matricula')
                        ->title('Código')
                        ->required(),
                    
                    
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
     * @param TecnicosModel $tecnicos
     *
     * @return array
     */
    public function asyncGetData(TecnicosModel $tecnicos): array
    {
        return [
            'tecnicos' => $tecnicos
        ];
    }

    
    /**
     * @param TecnicosModel $tecnicos
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(TecnicosModel $tecnicos, Request $request)
    {
        try {
        $tecnicos->fill($request->get('tecnicos'))->save();

        Toast::success('tecnico '.$tecnicos->col_nome.' cadastrado com sucesso!');
        
        return redirect()->route('platform.tecnicos');

    }
    catch (Exception $e) {
        Toast::error('Erro ao cadastrar: '. $e->getMessage());
    }

    }

    
     /**
     * @param TecnicosModel $tecnicos
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TecnicosModel $tecnicos, Request $request)
    {

        try {
            $tecnicos->fill($request->get('tecnicos'))->save();

            Toast::success('plantão '.$tecnicos->col_data.' alterada com sucesso!');
            
            return redirect()->route('platform.tecnicos');
        } catch (Exception $e) {
            Toast::error('Erro ao alterar: '. $e->getMessage());
        }
       
    }


    /**
     * @param TecnicosModel $tecnicos
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(TecnicosModel $tecnicos)
    {
        try {
            $tecnicos->delete();

            Toast::success('tecnicos '.$tecnicos->col_data.'  excluída com sucesso!');
    
            return redirect()->route('platform.tecnicos');
        } catch (PDOException $e) {

            Toast::error('Erro ao deletar: '. $e->getMessage());
            
            
        }
       
    }
    
}
