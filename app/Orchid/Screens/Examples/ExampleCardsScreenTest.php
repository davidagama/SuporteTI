<?php

namespace App\Orchid\Screens\Examples;

use App\Models\Post;
use Illuminate\Http\Request;
use Orchid\Platform\Models\User;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Contracts\Cardable;
use Orchid\Screen\Layouts\Card;
use Orchid\Screen\Layouts\Compendium;
use Orchid\Screen\Layouts\Facepile;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ExampleCardsScreenTest extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Cards';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'posts' => Post::paginate(),

            //inicio do card
            'card' => new class implements Cardable {
                /**
                 * @return string
                 */
                public function title(): string
                {
                    return 'post.title';
                           
                    
                }

                /**
                 * @return string
                 */
                public function description(): string
                {
                    return 'This is a wider card with supporting text below as a natural lead-in to additional content.
                            This content is a little bit longer. This is a wider card with supporting text below as
                            a natural lead-in to additional content. This content is a little bit longer.
                            This is a wider card with supporting text below as a natural lead-in to additional content.
                            This content is a little bit longer.';
                }

                /**
                 * @return string
                 */
                public function image(): ?string
                {
                    return 'https://picsum.photos/600/300';
                }

                /**
                 * @return mixed
                 */
                public function color(): ?Color
                {
                    return Color::INFO();
                }

                /**
                 * {@inheritdoc}
                 */
                public function status(): ?Color
                {
                    return Color::INFO();
                }
            },

            //fim do card

           
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @throws \Throwable
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            Layout::columns([
            new Card('card', [
                Button::make('Example Button')
                    ->method('showToast')
                    ->icon('bag'),
                Button::make('Example Button')
                    ->method('showToast')
                    ->icon('bag'),
            ])
            ]),

            /* Layout::columns([
                new Card('cardPersona'),
                new Card('cardPersona', [
                    Button::make('Example Button')
                        ->method('showToast')
                        ->icon('bag'),

                    Button::make('Example Button')
                        ->method('showToast')
                        ->icon('bag'),
                ]), 
            ]),*/

           

            
        ];
    }

    /**
     * @param Request $request
     */
    public function showToast(Request $request)
    {
        Toast::warning($request->get('toast', 'Hello, world! This is a toast message.'));
    }
}
