<?php

namespace LightSuner\CarbonBundle\Tests\Request\ParamConverter;

use Symfony\Component\HttpFoundation\Request;
use LightSuner\CarbonBundle\Request\ParamConverter\CarbonParamConverter;

class CarbonParamConverterTest extends \PHPUnit_Framework_TestCase
{
    private $converter;
    private $carbonClass;

    public function setUp()
    {
        $this->converter = new CarbonParamConverter();
        $this->carbonClass = "Carbon\\Carbon";
    }

    public function testSupports()
    {
        $config = $this->createConfiguration($this->carbonClass);
        $this->assertTrue($this->converter->supports($config));

        $config = $this->createConfiguration(__CLASS__);
        $this->assertFalse($this->converter->supports($config));

        $config = $this->createConfiguration();
        $this->assertFalse($this->converter->supports($config));
    }

    public function testApply()
    {
        $request = new Request(array(), array(), array('start' => '2012-07-21 00:00:00'));
        $config = $this->createConfiguration($this->carbonClass, "start");

        $this->converter->apply($request, $config);

        $this->assertInstanceOf($this->carbonClass, $request->attributes->get('start'));
        $this->assertEquals('2012-07-21', $request->attributes->get('start')->format('Y-m-d'));
    }

    public function testApplyWithFormatInvalidDate404Exception()
    {
        $request = new Request(array(), array(), array('start' => '2012-07-21'));
        $config = $this->createConfiguration($this->carbonClass, "start");
        $config->expects($this->any())->method('getOptions')->will($this->returnValue(array('format' => 'd.m.Y')));

        $this->setExpectedException('Symfony\Component\HttpKernel\Exception\NotFoundHttpException', 'Invalid date given.');
        $this->converter->apply($request, $config);
    }

    public function createConfiguration($class = null, $name = null)
    {
        $config = $this->getMockBuilder('Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter', array(
            'getClass',
            'getAliasName',
            'getOptions',
            'getName',
            'allowArray'
        ))->disableOriginalConstructor()->getMock();
        if ($name !== null) {
            $config->expects($this->any())->method('getName')->will($this->returnValue($name));
        }
        if ($class !== null) {
            $config->expects($this->any())->method('getClass')->will($this->returnValue($class));
        }

        return $config;
    }
}
    