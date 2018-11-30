<?php

namespace LightSuner\CarbonBundle\Form\Extension;

use LightSuner\CarbonBundle\Form\DataTransformer\CarbonToDateTimeTransformer;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class CarbonTimeExtension
 *
 * @author Michał Fastyn <jiferpl@gmail.com>
 */
class CarbonTimeExtension extends AbstractTypeExtension
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
        return TimeType::class;
    }
}
