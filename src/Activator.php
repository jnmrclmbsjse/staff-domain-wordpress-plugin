<?php

namespace StaffDomainWordpressPlugin;

class Activator
{
    public function run(): void
    {
        update_option(Core::PLUGIN_VERSION_KEY, STAFF_DOMAIN_WORDPRESS_PLUGIN_VERSION);
    }
}