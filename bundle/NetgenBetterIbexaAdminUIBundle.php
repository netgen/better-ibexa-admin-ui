<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle;

use Netgen\Bundle\BetterIbexaAdminUIBundle\DependencyInjection\Compiler\SearchOverridePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class NetgenBetterIbexaAdminUIBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new SearchOverridePass());
    }
}
