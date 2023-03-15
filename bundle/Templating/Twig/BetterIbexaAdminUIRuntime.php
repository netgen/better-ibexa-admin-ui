<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Templating\Twig;

use Ibexa\Contracts\Core\Repository\Values\Content\Query;
use Ibexa\Contracts\Core\Repository\Values\Content\Query\Criterion;
use Netgen\IbexaSiteApi\API\FilterService;
use Twig\Extension\RuntimeExtensionInterface;

final class BetterIbexaAdminUIRuntime implements RuntimeExtensionInterface
{
    private FilterService $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function countContentByContentType(string $contentTypeIdentifier): int
    {
        $query = new Query();
        $query->filter = new Criterion\ContentTypeIdentifier($contentTypeIdentifier);
        $query->limit = 0;

        return $this->filterService->filterContent($query)->totalCount ?? 0;
    }
}
