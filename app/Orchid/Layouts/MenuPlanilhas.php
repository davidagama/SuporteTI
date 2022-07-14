<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Actions\Menu;
use Orchid\Screen\Layouts\TabMenu;

class MenuPlanilhas extends TabMenu
{
    /**
     * Get the menu elements to be displayed.
     *
     * @return Menu[]
     */
    protected function navigations(): iterable
    {
        return [
            Menu::make('Ips e Domínios')
                ->route('platform.dominios'),

            Menu::make('Código dos estabelecimentos')
                ->route('platform.estabelecimentos'),

            Menu::make('Kyoceras')
            ->route('platform.tabelas'),

            /* Menu::make('Example screen')
                ->icon('monitor')
                ->route('platform.example')
                ->badge(function () {
                    return 6;
                }),
                */
        ]; 
    }
}
