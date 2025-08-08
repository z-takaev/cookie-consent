<?php

namespace Ztakaev\CookieConsent\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Ztakaev\CookieConsent\Commands\PublishCommand;

class CookieConsentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'cookie-consent');

        Blade::directive('cookieConsentCss', function () {
            return "<?php echo '<link rel=\"stylesheet\" href=\"' . asset('vendor/cookie-consent/main.css') . '\">'; ?>";
        });

        Blade::directive('cookieConsentJs', function () {
            return "<?php echo '<script src=\"' . asset('vendor/cookie-consent/main.js') . '\"></script>'; ?>";
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishCommand::class,
            ]);
        }

        $this->mergeConfigFrom(
            __DIR__.'/../config/cookie-consent.php', 'cookie-consent'
        );

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/cookie-consent'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../config/cookie-consent.php' => config_path('cookie-consent.php'),
        ], 'config');
    }
}
