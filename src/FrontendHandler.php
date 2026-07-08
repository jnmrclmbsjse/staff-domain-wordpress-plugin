<?php

namespace StaffDomainWordpressPlugin;

use GuzzleHttp\Client;

class FrontendHandler
{
    public function displayNasa($content)
    {
        $currentApiKeyValue = get_option(Core::OPTION_API_KEY_KEY, '');
        if (!empty($currentApiKeyValue)) {
            try {
                $nasaClient = new Client([
                    'base_uri' => 'https://api.nasa.gov/'
                ]);
                $apodResponse = $nasaClient->request('GET', "planetary/apod?api_key=$currentApiKeyValue");
                $apodContent = json_decode($apodResponse->getBody()->getContents(), true);
                $content .= <<<HTML
<div>
APOD from NASA:<br/>
Date: {$apodContent['date']}<br/>
Title: {$apodContent['title']}<br/>
</div>
HTML;
            } catch (\Throwable $throwable) {
                $content .= '<div>Error fetching NASA data</div>';
            }
        }

        return $content;
    }
}