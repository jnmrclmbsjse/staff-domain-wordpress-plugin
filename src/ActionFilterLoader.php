<?php

namespace StaffDomainWordpressPlugin;

class ActionFilterLoader
{
    private const TYPE_ACTION = 'action';
    private const TYPE_FILTER = 'filter';

    /**
     * @var array the actions registered with WordPress to fire when the plugin loads
     */
    private array $actions = [];

    /**
     * The array of filters registered with WordPress.
     */
    private array $filters = [];

    public function addAction(string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->add(self::TYPE_ACTION, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function addFilter(string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $this->add(self::TYPE_FILTER, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function run(): void
    {
        foreach ($this->filters as $hook) {
            add_filter(
                $hook['hook'],
                [$hook['component'], $hook['callback']],
                $hook['priority'],
                $hook['accepted_args']
            );
        }

        foreach ($this->actions as $hook) {
            add_action(
                $hook['hook'],
                [$hook['component'], $hook['callback']],
                $hook['priority'],
                $hook['accepted_args']
            );
        }
    }

    private function add(string $type, string $hook, $component, string $callback, int $priority = 10, int $accepted_args = 1): void
    {
        $hook = [
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback,
            'priority' => $priority,
            'accepted_args' => $accepted_args,
        ];

        if ($type === self::TYPE_ACTION) {
            $this->actions[] = $hook;
        } else {
            $this->filters[] = $hook;
        }
    }
}