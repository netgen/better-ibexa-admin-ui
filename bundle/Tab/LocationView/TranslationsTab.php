<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Tab\LocationView;

use Ibexa\AdminUi\Tab\LocationView\TranslationsTab as IbexaTranslationsTab;
use Ibexa\AdminUi\UI\Dataset\DatasetFactory;
use Ibexa\Contracts\Core\Repository\LanguageService;
use Ibexa\Contracts\Core\Repository\PermissionResolver;
use Netgen\Bundle\BetterIbexaAdminUIBundle\Form\FormFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Twig\Environment;

final class TranslationsTab extends IbexaTranslationsTab
{
    public function __construct(
        Environment $twig,
        TranslatorInterface $translator,
        DatasetFactory $datasetFactory,
        UrlGeneratorInterface $urlGenerator,
        EventDispatcherInterface $eventDispatcher,
        FormFactoryInterface $formFactory,
        LanguageService $languageService,
        private readonly PermissionResolver $permissionResolver,
        private readonly FormFactory $localFormFactory,
    ) {
        parent::__construct(
            $twig,
            $translator,
            $datasetFactory,
            $urlGenerator,
            $eventDispatcher,
            $formFactory,
            $permissionResolver,
            $languageService
        );
    }

    public function getTemplateParameters(array $contextParameters = []): array
    {
        /** @var \Ibexa\Contracts\Core\Repository\Values\Content\Content $content */
        $content = $contextParameters['content'];
        $parentParameters = parent::getTemplateParameters($contextParameters);

        $alwaysAvailableUpdateForm = $this->localFormFactory->createContentAlwaysAvailableUpdateForm(
            $content->contentInfo
        );
        $canEdit = $this->permissionResolver->canUser(
            'content',
            'edit',
            $content,
        );

        $parameters = [
            'form_always_available_update' => $alwaysAvailableUpdateForm->createView(),
            'can_edit' => $canEdit,
        ];

        return $parentParameters + $parameters;
    }
}
