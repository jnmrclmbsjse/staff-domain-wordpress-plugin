<?php

namespace StaffDomainWordpressPlugin\Pages;

abstract class AbstractPage implements PageInterface
{
    protected string $slug = '';
    protected string $title = '';

    final public function getSlug(): string
    {
        return "staff-domain-wordpress-plugin-$this->slug";
    }

    final public function getActionName(): string
    {
        return "load-staff-domain-wordpress-plugin-page-$this->slug";
    }

    public function initialize(): void
    {
        do_action($this->getActionName());
        $this->render();
    }

    protected function render(): void
    {
        echo "<div class='staff-domain-wordpress-plugin-page staff-domain-wordpress-plugin-page-$this->slug'>";

        $this->renderTitle();

        echo '</div>';
    }

    protected function renderTitle(): void
    {
        $title = __('Staff Domain - WordPress Custom Plugin');
        if ($this->title) {
            $title .= ' - '.$this->title;
        }

        $title = esc_html($title);

        echo <<<HTML
<h1>$title</h1>
HTML;
    }
}