<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use function array_merge;

final class AdminDesignPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasParameter('ibexa.design.list')) {
            return;
        }

        $designList = $container->getParameter('ibexa.design.list');
        $designList['admin'] = array_merge(['ngadmin'], $designList['admin'] ?? []);
        $container->setParameter('ibexa.design.list', $designList);
    }
}
