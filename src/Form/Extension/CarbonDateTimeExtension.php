<?php

namespace LightSuner\CarbonBundle\Form\Extension;

use LightSuner\CarbonBundle\Form\DataTransformer\CarbonToDateTimeTransformer;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * CarbonDateTimeExtension
 *
 * @author Sander Marechal <s.marechal@jejik.com>
 */
class CarbonDateTimeExtension extends AbstractTypeExtension
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
        return DateTimeType::class;
    }
}
