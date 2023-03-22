<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Form;

use Ibexa\Contracts\Core\Repository\Values\Content\ContentInfo;
use Netgen\Bundle\BetterIbexaAdminUIBundle\Form\Data\Content\ContentUpdateAlwaysAvailableData;
use Netgen\Bundle\BetterIbexaAdminUIBundle\Form\Type\Content\Translation\AlwaysAvailableUpdateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

final class FormFactory
{
    public function __construct(
        private readonly FormFactoryInterface $formFactory,
    ) {
    }

    public function createContentAlwaysAvailableUpdateForm(?bool $alwaysAvailable = null): FormInterface
    {
        $data = $alwaysAvailable ? new ContentUpdateAlwaysAvailableData($alwaysAvailable) : null;

        return $this->formFactory->createNamed(
            'ng-content-update-always-available',
            AlwaysAvailableUpdateType::class,
            $data,
        );
    }
}
