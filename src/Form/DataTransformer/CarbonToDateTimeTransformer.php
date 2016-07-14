<?php

namespace LightSuner\CarbonBundle\Form\DataTransformer;

use Carbon\Carbon;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Tranform Carbon to DateTime
 *
 * @author Sander Marechal <s.marechal@jejik.com>
 */
class CarbonToDateTimeTransformer implements DataTransformerInterface
{
    /**
     * {@inheritDoc}
     */
    public function transform($carbon)
    {
        return $carbon; // No conversion required
    }

    /**
     * {@inheritDoc}
     */
    public function reverseTransform($dateTime)
    {
        return Carbon::instance($dateTime);
    }
}
