<?php

namespace LightSuner\CarbonBundle\Tests\Form\DataTransformer;

use Carbon\Carbon;
use LightSuner\CarbonBundle\Form\DataTransformer\CarbonToDateTimeTransformer;

class CarbonToDateTimeTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $transformer = new CarbonToDateTimeTransformer();
        $this->assertInstanceOf('DateTime', $transformer->transform(Carbon::now()));
    }

    public function testReverseTransform()
    {
        $transformer = new CarbonToDateTimeTransformer();
        $this->assertInstanceOf('Carbon\Carbon', $transformer->reverseTransform(new \DateTime()));
    }
}
