<?php

use Mar4ehk0\App;

require __DIR__ .  '/../bootstrap/bootstrap.php';

try {
    $app = new App();
    $app->run();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
