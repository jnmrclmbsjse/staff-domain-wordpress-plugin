<?php

namespace StaffDomainWordpressPlugin\Pages;

interface PageInterface
{
    public function getSlug(): string;

    public function initialize(): void;
}