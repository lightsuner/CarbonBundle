<?php

namespace LightSuner\CarbonBundle\Form\DataTransformer;

use Carbon\Carbon;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

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
        if ($dateTime === null) {
            return null;
        }

        if ($dateTime instanceof \DateTime) {
            return Carbon::instance($dateTime);
        }

        throw new UnexpectedTypeException($dateTime, '\\DateTime or null');
    }
}
