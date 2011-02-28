<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine;

use Imagine\Box;

abstract class AbstractImagineTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldCreateEmptyImage()
    {
        $factory = $this->getImagine();
        $image   = $factory->create(new Box(50, 50));
        $size    = $image->getSize();

        $this->assertInstanceOf('Imagine\ImageInterface', $image);
        $this->assertEquals(50, $size->getWidth());
        $this->assertEquals(50, $size->getHeight());
    }

    public function testShouldOpenAnImage()
    {
        $factory = $this->getImagine();
        $image   = $factory->open('tests/Imagine/Fixtures/google.png');
        $size    = $image->getSize();

        $this->assertInstanceOf('Imagine\ImageInterface', $image);
        $this->assertEquals(364, $size->getWidth());
        $this->assertEquals(126, $size->getHeight());
    }

    public function testShouldCreateImageFromString()
    {
        $factory = $this->getImagine();
        $image   = $factory->load(file_get_contents('tests/Imagine/Fixtures/google.png'));
        $size    = $image->getSize();

        $this->assertInstanceOf('Imagine\ImageInterface', $image);
        $this->assertEquals(364, $size->getWidth());
        $this->assertEquals(126, $size->getHeight());
    }

    abstract protected function getImagine();
}
