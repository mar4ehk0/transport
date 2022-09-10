<?php

namespace Mar4ehk0\Services;

use Mar4ehk0\Models\Transport\Collection;

class View
{
    public static function showCollection(Collection $collection): void
    {
        echo 'I have items:' . PHP_EOL;

        foreach ($collection as $item) {
            echo '  ' . $item->getDescription() . PHP_EOL;
        }

        echo 'Total items: ' . $collection->count() . PHP_EOL;
    }

    public static function showMessage(string $msg): void
    {
        echo $msg . PHP_EOL;
    }

}
