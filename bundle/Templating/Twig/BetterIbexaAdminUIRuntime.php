<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Templating\Twig;

use Ibexa\Contracts\Core\Repository\ContentService;
use Ibexa\Contracts\Core\Repository\Exceptions\NotFoundException;
use Ibexa\Contracts\Core\Repository\LanguageService;
use Ibexa\Contracts\Core\Repository\Values\Content\Query\Criterion;
use Ibexa\Contracts\Core\Repository\Values\Filter\Filter;
use Twig\Extension\RuntimeExtensionInterface;

final class BetterIbexaAdminUIRuntime implements RuntimeExtensionInterface
{
    private ContentService $contentService;
    private LanguageService $languageService;

    public function __construct(ContentService $contentService, LanguageService $languageService)
    {
        $this->contentService = $contentService;
        $this->languageService = $languageService;
    }

    public function countContentByContentType(string $contentTypeIdentifier): int
    {
        $filter = new Filter();
        $filter->withCriterion(new Criterion\ContentTypeIdentifier($contentTypeIdentifier));
        $filter->withLimit(1);

        return $this->contentService->find($filter)->getTotalCount() ?? 0;
    }

    /**
     * @throws NotFoundException
     */
    public function getLanguageName(string $languageCode): string
    {

        return $this->languageService->loadLanguage($languageCode)->name;
    }
}
