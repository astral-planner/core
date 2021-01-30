<?php

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PATHS, array(
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/build',
        __DIR__ . '/config',
        __DIR__ . '/public',
    ));

    $parameters->set(Option::CACHE_DIRECTORY, '.ecs_cache');

    $parameters->set(Option::SETS, array(
        SetList::CLEAN_CODE,
        SetList::PSR_12,
        SetList::DOCTRINE_ANNOTATIONS
    ));
};
