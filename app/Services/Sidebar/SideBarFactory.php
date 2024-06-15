<?php

namespace App\Services\Sidebar;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SideBarFactory
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    private array $menu = [
        // @formatter:off
        ['text' => 'Профиль', 'href' => '/profile', 'icon' => '',
            'perm'=>['ADMIN', 'BROKER', 'BIDDER']],

        ['text' => 'Лоты', 'href' => '/slots', 'icon' => '',
            'perm'=>['ADMIN']],

        ['text' => 'Должники', 'href' => '/debtors', 'icon' => '',
            'perm'=>['ADMIN']],

        ['text' => 'Суды', 'href' => '/courts', 'icon' => '',
            'perm'=>['ADMIN']],


    ];

    public function getTabs(): array
    {
        return array_filter($this->menu, function ($tab){
            return in_array($this->user->entity_type, $tab['perm']);
        });
    }
}
