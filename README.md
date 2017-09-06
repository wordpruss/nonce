# nonce
An Object-Oriented Wrap for notices displayed near the top of admin pages on WordPress.

### Basic usage
```php
<?php

use WordPruss\Notices\Notify;


Notify::error('Test an error notice');
Notify::info('Test an info notice');
Notify::warning('Test a warning notice');
Notify::success('Test a success notice');

// Hook up all the notices
Notify::hook();
```
