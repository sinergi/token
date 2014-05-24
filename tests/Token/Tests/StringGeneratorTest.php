<?php
namespace Sinergi\Token\Tests;

use Sinergi\Token\StringGenerator;
use PHPUnit_Framework_TestCase;

class StringGeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testRandomAlphanum()
    {
        $string = StringGenerator::randomAlnum(5000);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[a-zA-Z0-9]*$/", $string);
    }

    public function testRandomAlphanumUppercase()
    {
        $string = StringGenerator::randomAlnum(5000, true);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[A-Z0-9]*$/", $string);
    }

    public function testRandomAlpha()
    {
        $string = StringGenerator::randomAlpha(5000);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[a-zA-Z]*$/", $string);
    }

    public function testRandomAlphaUppercase()
    {
        $string = StringGenerator::randomAlpha(5000, true);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[A-Z]*$/", $string);
    }

    public function testRandomHexa()
    {
        $string = StringGenerator::randomHexa(5000);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[A-F0-9]*$/", $string);
    }

    public function testRandomNumeric()
    {
        $string = StringGenerator::randomNumeric(5000);
        $this->assertEquals(5000, strlen($string));
        $this->assertRegExp("/^[0-9]*$/", $string);
    }

    public function testRandomId()
    {
        $string = StringGenerator::randomId();
        $this->assertRegExp("/^[a-zA-Z0-9\\.]*$/", $string);

        $string = StringGenerator::randomId('prefix_');
        $this->assertRegExp("/^prefix_[a-zA-Z0-9\\.]*$/", $string);
    }

    public function testRandomUuid()
    {
        $string = StringGenerator::randomUuid();
        $this->assertRegExp("/^[a-z0-9]{8,8}-[a-z0-9]{4,4}-[a-z0-9]{4,4}-[a-z0-9]{4,4}-[a-z0-9]{12,12}$/", $string);
    }
}