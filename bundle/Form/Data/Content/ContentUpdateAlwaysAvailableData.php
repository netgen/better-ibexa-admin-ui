<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Form\Data\Content;

class ContentUpdateAlwaysAvailableData
{
    private ?bool $alwaysAvailable = null;

    public function __construct(?bool $alwaysAvailable = null)
    {
        if ($alwaysAvailable === null) {
            return;
        }

        $this->alwaysAvailable = $alwaysAvailable;
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
