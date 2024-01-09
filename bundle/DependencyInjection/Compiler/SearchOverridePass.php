<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Ibexa\AdminUi\Tab\Dashboard\MyContentTab;
use Ibexa\AdminUi\Tab\Dashboard\EveryoneContentTab;
use Ibexa\AdminUi\Tab\Dashboard\MyMediaTab;
use Ibexa\AdminUi\Tab\Dashboard\EveryoneMediaTab;
use Ibexa\AdminUi\Tab\LocationView\LocationsTab;
use Ibexa\AdminUi\UI\Service\PathService;
use Ibexa\GraphQL\DataLoader\SearchContentLoader;
use Ibexa\GraphQL\DataLoader\SearchLocationLoader;
use Ibexa\AdminUi\UI\Module\ContentTree\NodeFactory;
use Ibexa\Bundle\AdminUi\Controller\SectionController;
use Ibexa\AdminUi\UniversalDiscovery\UniversalDiscoveryProvider;
use Symfony\Component\DependencyInjection\Reference;

final class SearchOverridePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition('netgen.ibexa_site_api.filter_service.search_adapter')) {
            return;
        }

        $serviceIds = [
            PathService::class,
            MyContentTab::class,
            EveryoneContentTab::class,
            MyMediaTab::class,
            EveryoneMediaTab::class,
            LocationsTab::class,
            SearchContentLoader::class,
            SearchLocationLoader::class,
            NodeFactory::class,
            SectionController::class,
            UniversalDiscoveryProvider::class,
        ];

        foreach ($serviceIds as $serviceId) {
            $container->findDefinition($serviceId)->setArgument(
                '$searchService',
                new Reference('netgen.ibexa_site_api.filter_service.search_adapter'),
            );
        }
    }
}
