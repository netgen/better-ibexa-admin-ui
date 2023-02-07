<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Templating\Twig;

use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use Ibexa\Contracts\Core\Repository\Exceptions\InvalidArgumentException;
use Netgen\IbexaSiteApi\API\FilterService;
use Twig\Extension\RuntimeExtensionInterface;

class IbexaAdminUIRuntime implements RuntimeExtensionInterface
{
    private FilterService $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function countByContentType(string $contentTypeIdentifier): ?int
    {
        $query = new Query();
        $query->filter = new Criterion\ContentTypeIdentifier($contentTypeIdentifier);
        $query->limit = 0;

        try {
            return $this->filterService->filterContent($query)->totalCount;
        } catch (InvalidArgumentException $e) {
            return null;
        }
    }
}
