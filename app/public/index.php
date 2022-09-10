<?php

use Mar4ehk0\App;
use Mar4ehk0\Services\View;

require __DIR__ .  '/../bootstrap/bootstrap.php';

try {
    $app = new App();
    $app->run();
} catch (Exception $exception) {
    View::showMessage($exception->getMessage());
}
