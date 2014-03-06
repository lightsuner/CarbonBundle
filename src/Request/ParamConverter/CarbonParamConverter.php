<?php

/*
 * This file is part of the Symfony framework.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace LightSuner\CarbonBundle\Request\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Carbon\Carbon;

/**
 * Convert Carbon\Carbon instances from request attribute variable.
 */
class CarbonParamConverter implements ParamConverterInterface
{
    /**
     * @{inheritdoc}
     * 
     * @throws NotFoundHttpException When invalid date given
     */
    public function apply(Request $request, ConfigurationInterface $configuration)
    {
        $param = $configuration->getName();

        if (!$request->attributes->has($param)) {
            return false;
        }

        $options = $configuration->getOptions();
        $value   = $request->attributes->get($param);

        $date = isset($options['format'])
            ? Carbon::createFromFormat($options['format'], $value)
            : new Carbon($value);

        if (!$date) {
            throw new NotFoundHttpException('Invalid date given.');
        }

        $request->attributes->set($param, $date);

        return true;
    }

    /**
     * @{inheritdoc}
     */
    public function supports(ConfigurationInterface $configuration)
    {
        if (null === $configuration->getClass()) {
            return false;
        }

        return "Carbon\\Carbon" === $configuration->getClass();
    }
}
