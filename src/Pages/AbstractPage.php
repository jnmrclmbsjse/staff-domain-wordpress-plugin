<?php

namespace StaffDomainWordpressPlugin\Pages;

abstract class AbstractPage implements PageInterface
{
    protected string $slug = '';
    protected string $title = '';
    protected array $actions = [];

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

        $this->executeCurrentAction();

        $this->renderTitle();
        $this->renderBody();

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

    protected function executeCurrentAction(): void
    {
        $action = sanitize_key($_REQUEST['action'] ?? '');
        if ($action && isset($this->actions[$action])) {
            call_user_func_array($this->actions[$action], []);
        }
    }

    final protected function addAction(string $action, callable $function): void
    {
        $this->actions[$action] = $function;
    }

    final protected function getActionUrl(string $action)
    {
        return add_query_arg('action', $action);
    }

    final protected function renderFormStart(string $method = 'get', ?string $action = null): void
    {
        $action = esc_url($action ?? add_query_arg([]));
        $method = esc_attr($method);

        echo wp_kses("<form action='$action' method='$method' class='staff-domain-wordpress-plugin-form'>", [
            'form' => [
                'method' => [],
                'class' => [],
                'action' => [],
            ],
        ]);
    }

    final protected function renderFormEnd(): void
    {
        echo '</form>';
    }
}