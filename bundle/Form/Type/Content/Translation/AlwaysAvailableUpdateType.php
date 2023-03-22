<?php

declare(strict_types=1);

namespace Netgen\Bundle\BetterIbexaAdminUIBundle\Form\Type\Content\Translation;

use Netgen\Bundle\BetterIbexaAdminUIBundle\Form\Data\Content\ContentUpdateAlwaysAvailableData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlwaysAvailableUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'always_available',
            CheckboxType::class,
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'hidden' => true,
                ],
            ],
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContentUpdateAlwaysAvailableData::class,
            'translation_domain' => 'forms',
        ]);
    }
}
