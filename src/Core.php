<?php

namespace StaffDomainWordpressPlugin;

class Core
{
    public const PLUGIN_VERSION_KEY = 'staff_domain_wordpress_plugin_version';

    private ActionFilterLoader $actionFilterLoader;

    public function __construct()
    {
        $this->actionFilterLoader = new ActionFilterLoader();

        $this->registerMenu();
    }

    public function run(): void
    {
        $this->actionFilterLoader->run();
    }

    private function registerMenu(): void
    {
        $menu = new Menu();
        $this->actionFilterLoader->addAction('admin_menu', $menu, 'register');
    }
}