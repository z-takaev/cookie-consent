# Laravel Cookie Consent

Пакет для управления согласием на использование файлов cookie в Laravel приложениях.

## Требования

-   PHP 8.2 или выше
-   Laravel 12.0 или выше

## Установка

### 1. Установка через Composer

Установите пакет через Composer:

```bash
composer require z-takaev/cookie-consent
```

### 2. Публикация ресурсов

Опубликуйте ресурсы пакета:

```bash
php artisan cookie-consent:publish
```

### 3. Подключение стилей и скриптов

Добавьте CSS стили в секцию `<head>` вашего шаблона:

```blade
@cookieConsentCss
```

Подключите JavaScript в конце страницы перед закрывающим тегом `</body>`:

```blade
@cookieConsentJs
```

### 4. Использование компонента

Добавьте компонент всплывающего окна согласия на использование cookie в ваш шаблон:

```blade
<x-cookie-consent::popup />
```

или

```blade
<x-cookie-consent::popup
    main_text="main text example"
    btn_text="btn text example"
/>
```

## Конфигурация

При необходимости настройки параметров пакета, опубликуйте файл конфигурации:

```bash
php artisan vendor:publish --provider="Ztakaev\CookieConsent\Providers\CookieConsentServiceProvider" --tag="config"
```

После публикации файл конфигурации будет доступен по пути `config/cookie-consent.php`.

## Пример использования

### Базовая интеграция

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Мое приложение</title>
    @cookieConsentCss
</head>
<body>
    <!-- Ваш контент -->

    <x-cookie-consent::popup />

    @cookieConsentJs
</body>
</html>
```

## Настройка

## Лицензия

Этот пакет распространяется под лицензией MIT.
