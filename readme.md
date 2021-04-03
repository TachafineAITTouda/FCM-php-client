# FCM Notification Sending (0.0.1)

### Native PHP 

Install dependencies
```
composer install
```

If you don't have a web server, you can use the PHP local Dev Server 

```
php -S 127.0.0.1:8090 -t .
```

### PHP Framework (Laravel / Symfony)

If you are using a framework make sure to replace the line 28 in the file `FCMNotificationSenderService.php`

```php
// if you are using laravel replace it with this 
$FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN = env('FIREBASE_CLOUD_MESSAGING_SERVICE_TOKEN');
```
and it would be also better to use a better Request Client Library than curl

### NodeJs (axios)
much better option ? use FirebaseAdminSDK nodejs Library

install packages 
```
npm install
```
run the nodejs/index.js file 
```
node nodejs/index.js
```


##### any reviews or pull requests are welcomed.