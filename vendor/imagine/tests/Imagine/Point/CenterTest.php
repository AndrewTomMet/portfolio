<?php

/*
 * This file is part of the Imagine package.
 *
 * (c) Bulat Shakirzyanov <mallluhuct@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Imagine\Point;

use Imagine\Point;
use Imagine\PointInterface;
use Imagine\Box;
use Imagine\BoxInterface;

class CenterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Imagine\Point\Center::getX
     * @covers Imagine\Point\Center::getY
     *
     * @dataProvider getSizesAndCoordinates
     *
     * @param Imagine\BoxInterface   $box
     * @param Imagine\PointInterface $expected
     */
    public function testShouldGetCenterCoordinates(BoxInterface $box, PointInterface $expected)
    {
        $point = new Center($box);

        $this->assertEquals($expected->getX(), $point->getX());
        $this->assertEquals($expected->getY(), $point->getY());
    }

    /**
     * Data provider for testShouldGetCenterCoordinates
     *
     * @return array
     */
    public function getSizesAndCoordinates()
    {
        return array(
            array(new Box(10, 15), new Point(5, 8)),
            array(new Box(40, 23), new Point(20, 12)),
            array(new Box(14, 8), new Point(7, 4)),
        );
    }

    /**
     * @covers Imagine\Point\Center::__toString
     */
    public function testToString()
    {
        $this->assertEquals('(50, 50)', (string) new Center(new Box(100, 100)));
    }
}
