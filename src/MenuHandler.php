<?php

namespace StaffDomainWordpressPlugin;

use StaffDomainWordpressPlugin\Pages\SettingsPage;

class MenuHandler
{
    public function register(): void
    {
        $settingsPage = new SettingsPage();
        add_menu_page(
            __('Staff Domain'),
            __('Staff Domain'),
            'manage_options',
            $settingsPage->getSlug(),
            [$settingsPage, 'initialize'],
            null,
            '65'
        );
    }
}