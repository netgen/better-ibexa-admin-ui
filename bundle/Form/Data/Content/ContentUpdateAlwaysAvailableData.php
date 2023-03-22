<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Form\Data\Content;

use Ibexa\Contracts\Core\Repository\Values\Content\ContentInfo;

class ContentUpdateAlwaysAvailableData
{
    private ?ContentInfo $contentInfo = null;
    private ?bool $alwaysAvailable = null;

    public function __construct(?ContentInfo $contentInfo = null)
    {
        if ($contentInfo === null) {
            return;
        }

        $this->contentInfo = $contentInfo;
        $this->alwaysAvailable = $contentInfo->alwaysAvailable;
    }

    public function getContentInfo(): ?ContentInfo
    {
        return $this->contentInfo;
    }

    public function setContentInfo(?ContentInfo $contentInfo): void
    {
        $this->contentInfo = $contentInfo;
    }

    public function getAlwaysAvailable(): ?bool
    {
        return $this->alwaysAvailable;
    }

    public function setAlwaysAvailable(?bool $alwaysAvailable): void
    {
        $this->alwaysAvailable = $alwaysAvailable;
    }
}
