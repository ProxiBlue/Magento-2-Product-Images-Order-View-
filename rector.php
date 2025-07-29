<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__,
    ]);

    // Define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_80,
        LevelSetList::UP_TO_PHP_81,
        LevelSetList::UP_TO_PHP_82,
        LevelSetList::UP_TO_PHP_83,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::TYPE_DECLARATION,
    ]);

    // Set PHP version
    $rectorConfig->phpVersion(\Rector\ValueObject\PhpVersion::PHP_83);
};
