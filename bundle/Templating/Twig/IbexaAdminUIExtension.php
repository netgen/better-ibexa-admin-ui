<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Templating\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class IbexaAdminUIExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('count_by_content_type', [IbexaAdminUIRuntime::class, 'countByContentType']),
        ];
    }
}
