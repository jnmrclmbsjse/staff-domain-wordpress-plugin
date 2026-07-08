<?php

namespace StaffDomainWordpressPlugin;

class Core
{
    public const PLUGIN_VERSION_KEY = 'staff_domain_wordpress_plugin_version';
    public const OPTION_API_KEY_KEY = 'staff_domain_wordpress_plugin_api_key';

    private ActionFilterLoader $actionFilterLoader;

    public function __construct()
    {
        $this->actionFilterLoader = new ActionFilterLoader();

        $this->registerMenu();
        $this->registerFrontendDisplay();
    }

    public function run(): void
    {
        $this->actionFilterLoader->run();
    }

    private function registerMenu(): void
    {
        $menu = new MenuHandler();
        $this->actionFilterLoader->addAction('admin_menu', $menu, 'register');
    }

    private function registerFrontendDisplay(): void
    {
        $frontendHandler = new FrontendHandler();
        $this->actionFilterLoader->addFilter('the_title', $frontendHandler, 'displayNasa', 1);
    }
}