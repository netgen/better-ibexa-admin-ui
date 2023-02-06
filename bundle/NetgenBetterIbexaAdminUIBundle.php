<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle;

use Netgen\Bundle\BetterIbexaAdminUIBundle\DependencyInjection\CompilerPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NetgenBetterIbexaAdminUIBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new CompilerPass\AdminDesignPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 1000);
    }
}
