<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Templating\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class BetterIbexaAdminUIExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'ng_count_content_by_content_type',
                [BetterIbexaAdminUIRuntime::class, 'countContentByContentType'],
            ),
        ];
    }
}
