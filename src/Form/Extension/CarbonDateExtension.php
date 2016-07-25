<?php

namespace LightSuner\CarbonBundle\Form\Extension;

use LightSuner\CarbonBundle\Form\DataTransformer\CarbonToDateTimeTransformer;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * CarbonDateExtension
 *
 * @author Sander Marechal <s.marechal@jejik.com>
 */
class CarbonDateExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new CarbonToDateTimeTransformer());
    }

    /**
     * {@inheritDoc}
     */
    public function getExtendedType()
    {
        return DateType::class;
    }
}
