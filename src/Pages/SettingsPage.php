<?php

namespace StaffDomainWordpressPlugin\Pages;

use StaffDomainWordpressPlugin\Core;

class SettingsPage extends AbstractPage
{
    protected string $slug = 'settings';
    protected string $title = 'Settings';

    protected const SAVE_ACTION = 'save-action';

    public function __construct()
    {
        $this->addAction(self::SAVE_ACTION, [$this, 'saveAction']);;
    }

    public function renderBody(): void
    {
        $this->renderFormStart('post', $this->getActionUrl(self::SAVE_ACTION));
        $this->renderApiKeyField();
        $this->renderFormEnd();
    }

    private function renderApiKeyField(): void
    {
        $currentApiKeyValue = get_option(Core::OPTION_API_KEY_KEY, '');
        $formTitle = __('API key for NASA (https://api.nasa.gov/)');
        $submitButtonText = __('Save');
        echo <<<HTML
        <div>
            <h2>$formTitle</h2>
            <input type='text' name='staff-domain-wordpress-plugin-api-key' value='$currentApiKeyValue'/>
            <button type='submit' class="button" name='staff-domain-wordpress-plugin-submit'>$submitButtonText</button>
        </div>
        
HTML;
    }

    public function saveAction()
    {
        $url = remove_query_arg('action');

        if (isset($_POST['staff-domain-wordpress-plugin-submit'])) {
            update_option(Core::OPTION_API_KEY_KEY, sanitize_text_field($_POST['staff-domain-wordpress-plugin-api-key'] ?? ''));
        }

        wp_redirect($url);
    }
}