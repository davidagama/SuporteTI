<?php



namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class BlogScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Portal de suporte TI';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Bem vindo, sirva-se com nossas variedades!';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Help Desk')
                ->href('http://helpdesk.lojasnalin.com.br:89/ndesk/index.php')
                ->target('_blank')
                ->icon('headphones-microphone'),

            Link::make('OCS')
                ->href('http://srvsup.local/ocsreports/index.php')
                ->target('_blank')
                ->icon('screen-desktop'),

            Link::make('WhatsApp')
                ->href('https://web.whatsapp.com/')
                ->target('_blank')
                ->icon('bubbles'),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::view('platform::partials.blog'),
            
        ];
    }
}
