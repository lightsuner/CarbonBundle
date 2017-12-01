<?php

namespace LightSuner\CarbonBundle\Tests\Form\DataTransformer;

use Carbon\Carbon;
use LightSuner\CarbonBundle\Form\DataTransformer\CarbonToDateTimeTransformer;
use PHPUnit\Framework\TestCase;

class CarbonToDateTimeTransformerTest extends TestCase
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

    public function testReverseTransformWithNull()
    {
        $transformer = new CarbonToDateTimeTransformer();
        $this->assertNull($transformer->reverseTransform(null));
    }

    public function testReverseTransformWithIncorrectData()
    {
        $transformer = new CarbonToDateTimeTransformer();
        $this->expectException(
            'Symfony\Component\Form\Exception\UnexpectedTypeException',
            'The type of $value should be a DateTime or null.'
        );

        $transformer->reverseTransform("some string");
    }
}
