<?php

namespace StaffDomainWordpressPlugin\Pages;

class SettingsPage implements PageInterface
{
    public function getSlug(): string
    {
        return 'staff-domain-wordpress-plugin-settings';
    }
}