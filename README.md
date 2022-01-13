# :scroll: Flash

Flash is a simple tool written in php to help you install and display flash messages

# Usage

### Set Message

```php
session_start();
require "Flash.php";

$flash = new Flash();
$flash->set('success', 'Authorization succeeded', 'index.php');

$flash->set('error', 'Authorization failed', 'login.php');
```
<br>

### Display Message

```php
session_start();
require "Flash.php";

$flash = new Flash();
$flash->display('index.php');
```
<br>

# Documentation

### Method Set


```php
$flash->set(string $type, string $message, string $page): bool
```

***Type***

Message status. Can be success or error


***Message***

Any message that you want to display on the site


***Page***

The page on which you want to display the message

-------

### Method Get


```php
$flash->get(string $page): array : false
```

***Page***

The page where you want to receive a flash message

-------

### Method Display

Method display message in page

```php
$flash->get(string $page): null
```

***Page***

The page where you want to receive a flash message
