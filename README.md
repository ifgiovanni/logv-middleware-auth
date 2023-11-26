# logv-middleware-auth

[![Packagist][badge_package]][link-packagist]
[![Packagist Release][badge_release]][link-packagist]
[![Packagist Downloads][badge_downloads]][link-packagist]
 
Add provider to config/app.php:

Configure:

```php
Ifgiovanni\LogVMiddlewareAuth\Providers\LogVAuthRouteProvider::class
```

.env

```
ARCANEDEV_LOGVIEWER_MIDDLEWARE=log.viewer.auth
LOG_VIEWER_USER=YOUR_USER
LOG_VIEWER_PASSWORD=YOUR_PASSWORD
```

then

```
YOUR_APP/log-viewer/login
```

[badge_package]:      https://img.shields.io/badge/package-ifgiovanni/logv--middleware--auth-blue.svg?style=flat-square
[badge_release]:      https://img.shields.io/packagist/v/ifgiovanni/logv-middleware-auth.svg?style=flat-square
[badge_downloads]:    https://img.shields.io/packagist/dt/ifgiovanni/logv-middleware-auth.svg?style=flat-square

[link-packagist]:     https://packagist.org/packages/ifgiovanni/logv-middleware-auth
