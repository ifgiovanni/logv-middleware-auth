# logv-middleware-auth
 
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