<?php

namespace Ztakaev\CookieConsent\Commands;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    protected $signature = 'cookie-consent:publish';

    protected $description = 'Команда публикует ресурсы пакета';

    public function handle()
    {
        $this->call('vendor:publish', [
            '--provider' => 'Ztakaev\CookieConsent\Providers\CookieConsentServiceProvider',
            '--tag' => 'public',
            '--force' => true,
        ]);

        $this->info('Ресурсы успешно опубликованы');
    }
}
