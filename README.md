# :scroll: Flash

Flash is a simple tool written in php to help you install and display flash messages

# Usage

### Set Message

```php
session_start();
require "Flash.php";

$flash = new Flash();
$flash->set('success', 'Authorization succeeded', 'index.php');

$flash->set('error', 'Authorization failed', 'index.php');
```

### Display Message

```php
session_start();
require "Flash.php";

$flash = new Flash();
$flash->display('index.php');
```
