<?php

namespace App\Orchid\Screens;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Actions\ModalToggle;


class PostEditScreen extends Screen
{
    /**
     * @var Post
     */
    public $post;

    /**
     * Query data.
     *
     * @param Post $post
     *
     * @return array
     */
    public function query(Post $post): array
    {
        return [
            'post' => $post
        ];
    }

    /**
     * The name is displayed on the user's screen and in the headers
     */
    public function name(): ?string
    {
        return $this->post->exists ? 'Edit post' : 'Nova publicação';
    }

    /**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "Publicações";
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Publicar')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->post->exists),

            Button::make('Alterar')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->post->exists),

            ModalToggle::make('Remover')
                ->icon('trash')
                ->modal('exclusao')
                ->method('remove')
                ->canSee($this->post->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('post.title')
                    ->title('Title')
                    ->placeholder('Digite o título aqui')
                    ->help('Título do post. Ex: Mês do serão!'),

                TextArea::make('post.description')
                    ->title('Descrição')
                    ->rows(3)
                    ->maxlength(200)
                    ->placeholder('Resumo descritivo do post')
                    ->help('Ex: Mudanças a caminho, vamos trabalhar todos os domingos!'),

                Relation::make('post.author')
                    ->title('Author')
                    ->fromModel(User::class, 'name'),

                Quill::make('post.body')
                    ->title('Main text'),

            ]),
            Layout::modal('exclusao', Layout::rows([
                Label::make('post.title')
                    ->title('Deseja mesmo excluir este post?')
                    ->method('remove')

            ]))->title('Confirmar exclusão?')
                ->applyButton('Excluir')
                ->closeButton('Cancelar')
                ->async('asyncGetData'),

        ];
    }

    /**
     * @param Post    $post
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Post $post, Request $request)
    {
        $post->fill($request->get('post'))->save();

        Alert::info('Publicação feita com sucesso!');

        return redirect()->route('platform.post.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Post $post)
    {
        $post->delete();

        Alert::info('Publicação deletada com sucesso!');

        return redirect()->route('platform.post.list');
    }
}
