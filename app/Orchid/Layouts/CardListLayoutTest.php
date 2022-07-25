<?php

namespace App\Orchid\Layouts;
use App\Models\modeloModel;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Contracts\Cardable;
use Orchid\Screen\Layouts\Card;
use Orchid\Support\Color;

class CardListLayoutTest extends Card
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'posts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function cards(): array
    {
        return [


            //inicio do card
            'card' => new class implements Cardable {
                /**
                 * @return string
                 */
                public function title(): string
                {
                    return 'Title of a longer featured blog post';
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
            }
            ];
    }
}
