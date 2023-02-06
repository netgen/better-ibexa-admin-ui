<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getAlias(): string
    {
        return 'netgen_better_ibexa_admin_ui';
    }

    public function getConfigTreeBuilder(): TreeBuilder
    {
        return new TreeBuilder('netgen_better_ibexa_admin_ui');
    }
}
